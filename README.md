# PTAdmin Admin Skeleton

`ptadmin/admin-skeleton` 是 PTAdmin 后台项目模板，用于通过 `composer create-project` 快速创建一个最小 Laravel 宿主项目。

它本身不是后台内核库，后台能力来自 `ptadmin/admin`。模板只保留 Laravel 基础结构、运行目录、最小测试和 `ptadmin/admin` 的初始化入口，不再携带业务路由、业务控制器和旧迁移数据。

## 创建项目

```bash
composer create-project ptadmin/admin-skeleton your-project-name
```

## 安装后初始化

进入项目目录后执行：

```bash
composer install
php artisan key:generate
php artisan vendor:publish --provider="PTAdmin\\Admin\\Providers\\PTAdminServiceProvider" --tag=ptadmin-config --force
php artisan vendor:publish --provider="PTAdmin\\Admin\\Providers\\PTAdminServiceProvider" --tag=ptadmin-migrations --force
php artisan migrate
```

如需初始化创始人账户：

```bash
php artisan admin:init
```

## 目录说明

- `app/` Laravel 基础应用代码
- `config/` Laravel 与 PTAdmin 基础配置
- `database/` 空迁移目录，等待业务项目自行扩展
- `public/` Web 入口
- `routes/` 最小健康检查路由
- `tests/` 最小 smoke tests

## 依赖关系

- `ptadmin/admin` 提供后台认证、授权、资源、角色与后台接口
- `ptadmin/addon` 与 `ptadmin/easy` 会作为 `ptadmin/admin` 的依赖一起安装

## 发布建议

建议将该模板仓库独立发布为：

- GitHub: `ptadmin/admin-skeleton`
- Packagist: `ptadmin/admin-skeleton`

发布后即可直接使用：

```bash
composer create-project ptadmin/admin-skeleton
```
