<p align="center">
<a href="https://github.com/Moe-CMS/MoeUserServices-PHP/actions"><img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/Moe-CMS/MoeUserServices-PHP/CI.yml?branch=dev"></a>
<!-- <a href="https://codecov.io/gh/Moe-CMS/MoeUserServices-PHP"><img alt="Codecov" src="https://img.shields.io/codecov/c/github/Moe-CMS/MoeUserServices-PHP?style=flat-square"></a> -->
<a href="https://github.com/Moe-CMS/MoeUserServices-PHP/releases"><img alt="GitHub release (latest SemVer including pre-releases)" src="https://img.shields.io/github/v/release/Moe-CMS/MoeUserServices-PHP?include_prereleases&style=flat-square"></a>
<a href="https://github.com/Moe-CMS/MoeUserServices-PHP/blob/master/LICENSE"><img alt="GitHub" src="https://img.shields.io/github/license/Moe-CMS/MoeUserServices-PHP?style=flat-square"></a>

- [简体中文](#简体中文)
- **English**

# English
# MoeUserServices-PHP
Support OAuth 2.0 users with login interface to log in the pass system, and support UCenter, It is an open-source program that can realize synchronous login of multiple sites and synchronous management of the site background.

Multi site user synchronization is more convenient, and multi site user management is fast and good.

## Features
- Independent user registration and login page.
- Independent management background.
- It is perfectly compatible with UCenter and supports OAuth 2.0 authentication.
- Self created MAuth application synchronization protocol.
- OAuth 2.0 independent authentication interface.
- Easy-to-use
  - Make background management simpler.
  - Users can use personal information, SMS chat and other functions more efficiently.
- Security
  - Bcrypt encryption algorithm with high security is used.
  - Email verification for registration.
  - Score system for preventing evil requests.
  - Use the recaptch verification code to realize non machine registration, or use the verification code provided by the system.
- Incredibly extensible
  - Support API aggregation login of most websites.
  - Integrate UCenter, OAuth 2.0 and MAuth, and support synchronous login.
  - New login API support will always be added.

## Requirements
MoeUserCenter-PHP has only a few system requirements. In most cases, these PHP extensions are already enabled.

- Web server with URL rewriting enabled (Apache,Kangle,Nginx,Caddy and so on)
- PHP >= 7.2.5
- PHP Extensions
  - OpenSSL >= 1.1.1 (TLS 1.3)
  - PDO
  - Mbstring
  - Tokenizer
  - GD
  - XML
  - Ctype
  - JSON
  - fileinfo
  - zip
  - redis(Optional)
  - memcache(Optional)
  - memcached(Optional)

## Quick Install
We are developing...

## Supporting MoeUserServices-PHP

Welcome to sponsoring MoeUserServices-PHP if this software is useful for you!

Currently you can sponsor us via [爱发电](https://afdian.net/@MoeCinnamo).

### Sponsors

<table>
  <tbody>
    <tr>
      <td align=center>
        <a href="https://afdian.net/@MoeCinnamo">
          <img src="https://cravatar.cn/avatar/ae4dd9f92845152e9ae8b67a4ec8e53e" width="120" height="120">
          <br>
          Cinnamon(Chihiro)
        </a>
      </td>
      </tr>
    </tbody>
</table>

### Backers

<table>
  <tbody>
    <tr>
      <td align=center>
        <a href="https://afdian.net/@MoeCinnamo">
          <img src="https://cravatar.cn/avatar/ae4dd9f92845152e9ae8b67a4ec8e53e" width="120" height="120">
          <br>
          Cinnamon(Chihiro)
        </a>
      </td>
      </tr>
    </tbody>
</table>

## Build From Source
Coming soon...
<!-- Please refer to [Manual Build](). -->

## Internationalization

MoeUserServices-PHP supports multiple languages.

At present, we only support English, and will add simplified Chinese translation after the release.

If you want to translate for us, please submit the request in the `/app/lang` directory after the release of our first official version.

## Report Bugs
Coming soon...
<!-- Read [FAQ]() and double check if your situation doesn't suit any case mentioned there before reporting.

When reporting a problem, please attach your log file (located at `runtime/log/*.log`) and the information of your server where the error occured on. You should also read this [guide]() before reporting a problem.

## Related Links

- [User Manual]() -->

## Copyright & License

Apache License 2.0

Copyright (c) 2020-present SANYIMOE Inc.

- [English](#English)
- **简体中文**

# 简体中文
# 小萌用户中心-PHP版本
开源的用户管理程序，支持OAuth 2.0用户登录认证系统，支持UCenter，可以实现多个站点的同步登录和站点后台的同步管理。

多站点用户同步更加方便，多站点用户管理快速而良好。

## 特征
- 独立的用户注册和登录页面。
- 独立的用户后台和管理后台。
- 它与UCenter完全兼容，并支持OAuth 2.0身份验证。
- 自行创建的MAuth应用程序同步协议。
- OAuth 2.0独立身份验证接口。
- 易于使用
  - 使后台管理更简单。
  - 用户可以更有效地使用个人信息、私聊和其他功能。
- 安全性
  - 使用具有高安全性的Bcrypt加密算法。
  - 注册电子邮件验证。
  - 防止恶意请求的评分系统。
  - 使用recaptche验证码实现非机器注册，也可使用系统自带的验证码实现。
- 难以置信的可扩展性
  - 支持大多数网站的API聚合登录。
  - 集成UCenter、OAuth 2.0和MAuth，并支持同步登录。
  - 将始终添加新的登录API支持。

## 必要的
小萌用户中心-PHP版本 只有几个系统要求。在大多数情况下，这些PHP扩展已经启用。

- 开启URL重写的Web服务器 (Apache,Kangle,Nginx,Caddy等)
- PHP >= 7.2.5
- PHP 扩展
  - OpenSSL >= 1.1.1 (TLS 1.3)
  - PDO
  - Mbstring
  - Tokenizer
  - GD
  - XML
  - Ctype
  - JSON
  - fileinfo
  - zip
  - redis(可选)
  - memcache(可选)
  - memcached(可选)

## 快速安装
我们正在开发中...

## 赞助 小萌用户中心-PHP版本

如果你认为 小萌用户中心-PHP版本 对你有用，欢迎来赞助我们!

您可以通过 [爱发电](https://afdian.net/@MoeCinnamo) 进行赞助。

### 赞助商

<table>
  <tbody>
    <tr>
      <td align=center>
        <a href="https://afdian.net/@MoeCinnamo">
          <img src="https://cravatar.cn/avatar/ae4dd9f92845152e9ae8b67a4ec8e53e" width="120" height="120">
          <br>
          Cinnamon(Chihiro)
        </a>
      </td>
      </tr>
    </tbody>
</table>

### 支持者

<table>
  <tbody>
    <tr>
      <td align=center>
        <a href="https://afdian.net/@MoeCinnamo">
          <img src="https://cravatar.cn/avatar/ae4dd9f92845152e9ae8b67a4ec8e53e" width="120" height="120">
          <br>
          Cinnamon(Chihiro)
        </a>
      </td>
      </tr>
    </tbody>
</table>

## 通过源码开发
敬请期待...
<!-- Please refer to [Manual Build](). -->

## 多语言

MoeUserServices PHP支持多种语言。

目前，我们只支持英文，并将在发布后添加简体中文和繁體中文翻译。

如果您想为我们翻译，请在我们的第一个正式版本发布后在`/app/lang`目录中提交请求。

## BUG反馈
敬请期待...
<!-- Read [FAQ]() and double check if your situation doesn't suit any case mentioned there before reporting.

When reporting a problem, please attach your log file (located at `runtime/log/*.log`) and the information of your server where the error occured on. You should also read this [guide]() before reporting a problem.

## Related Links

- [User Manual]() -->

## 授权 & 许可证

Apache License 2.0

Copyright (c) 2020-present SANYIMOE Inc.
