# drupal8-rest

## Introduction

This project is a demo phunctional Drupal REST API for Articles Content type

## Install

To install through Composer, by run the following commands:
```
git clone https://github.com/webtack/drupal8-rest.git
```

```$xslt
composer install
```

## Config

- Copy this file `config/settings.pgp` to `web/sites/default`
- Edit the file for connection database
- Import DB `config/db` 
- Generate keys from API  [https://www.drupal.org/project/simple_oauth] docs

## API

### Auth options
*Headers*
```$xslt
Content-Type: application/x-www-form-urlencoded
```

*Form Data*
```$xslt
username:admin
password:qwerty123
client_secret:qwerty123
grant_type:password
client_id:f685da7c-702c-4af1-ad5d-7b8c9106b46d
scope:oauth
```

### API Options
*Headers*
```$xslt
Content-Type:application/json
Authorization:Bearer ...
```

### Api Routes

- `GET /api/article/{nid}` (Get article by nid)
- `POST /api/article/{nid}` (Edit article)
- `DELETE /api/article/{nid}` (Delete article)
- `POST /api/article/create` (Create article)
