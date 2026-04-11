<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PTAdmin\Foundation\Exceptions\ServiceException;
use PTAdmin\Foundation\Response\AdminResponse;
use Throwable;

class Handler extends ExceptionHandler
{

    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
        ServiceException::class,
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function render($request, Throwable $e): \Symfony\Component\HttpFoundation\Response
    {
        if ($this->shouldReturnJsonResponse($request)) {
            $data = $this->normalizeExceptionPayload($e);

            return AdminResponse::fail($data, (int) $data['code']);
        }

        return parent::render($request, $e);
    }

    /**
     * 前后端分离接口统一返回 JSON，避免异常时回退到网页响应。
     */
    protected function shouldReturnJsonResponse(Request $request): bool
    {
        $adminApiPrefix = trim((string) admin_api_prefix(), '/');

        return 'api' === $request->header('X-Method')
            || $request->expectsJson()
            || $request->wantsJson()
            || $request->ajax()
            || $request->isXmlHttpRequest()
            || $request->is('api/*')
            || ('' !== $adminApiPrefix && $request->is($adminApiPrefix.'/*'));
    }

    /**
     * 将异常归一化为统一的接口错误结构。
     *
     * @return array<string, mixed>
     */
    protected function normalizeExceptionPayload(Throwable $e): array
    {
        $data = [
            'code' => $this->normalizeExceptionCode($e),
            'message' => $e->getMessage(),
        ];

        if ($e instanceof ValidationException) {
            $errors = $e->validator->errors()->toArray();
            $messages = [];
            foreach ($errors as $fieldMessages) {
                $messages[] = implode('|', (array) $fieldMessages);
            }

            $data['code'] = 20000;
            $data['message'] = implode("\n", $messages);
            $data['errors'] = $errors;
        } elseif ($e instanceof AuthenticationException) {
            $data['code'] = 401;
            $data['message'] = __('ptadmin::background.no_login');
        } elseif ($e instanceof AuthorizationException) {
            $data['code'] = 403;
            $data['message'] = __('ptadmin::background.403');
        }

        if ('' === (string) $data['message']) {
            $data['message'] = __('ptadmin::background.500');
        }

        if (true === config('app.debug')) {
            $data['file'] = $e->getFile();
            $data['line'] = $e->getLine();
        }

        return $data;
    }

    protected function normalizeExceptionCode(Throwable $e): int
    {
        $code = (int) $e->getCode();

        return $code > 0 ? $code : 10000;
    }
}
