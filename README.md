<p align="center">
<a href="https://github.com/Moe-CMS/MoeUserServices-PHP/actions"><img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/Moe-CMS/MoeUserServices-PHP/CI.yml?branch=dev"></a>
<!-- <a href="https://codecov.io/gh/Moe-CMS/MoeUserServices-PHP"><img alt="Codecov" src="https://img.shields.io/codecov/c/github/Moe-CMS/MoeUserServices-PHP?style=flat-square"></a> -->
<a href="https://github.com/Moe-CMS/MoeUserServices-PHP/releases"><img alt="GitHub release (latest SemVer including pre-releases)" src="https://img.shields.io/github/v/release/Moe-CMS/MoeUserServices-PHP?include_prereleases&style=flat-square"></a>
<a href="https://github.com/Moe-CMS/MoeUserServices-PHP/blob/master/LICENSE"><img alt="GitHub" src="https://img.shields.io/github/license/Moe-CMS/MoeUserServices-PHP?style=flat-square"></a>

- [简体中文](#zh-cn)
- **English**

# MoeUserCenter-PHP
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
  - The recaptcha verification code when registering.
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