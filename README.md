# drupal8-rest

## Demo
[http://bit.ly/2wEYIo2](http://bit.ly/2wEYIo2)

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
```$xslt
vendor/drush/drush/drush cache:rebuild
```

## Config

- Copy this file `config/settings.php` to `web/sites/default`
- Copy this file `config/sites` to `web`
- Edit the file for connection database
- Import DB `config/db` 
- Check permissions [drupal directories](https://www.drupal.org/forum/support/post-installation/2016-09-22/file-and-directory-permissions-lets-finally-get-this)
- Generate keys from API [see docs](https://www.drupal.org/project/simple_oauth) 

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
*Return*
```$xslt
[
    {
        "nid": [
            {
                "value": 1
            }
        ],
        "uuid": [
            {
                "value": "bbd3efd3-17c2-4bf2-8625-e33f0f9e2283"
            }
        ],
        "vid": [
            {
                "value": 1
            }
        ],
        "langcode": [
            {
                "value": "en"
            }
        ],
        "type": [
            {
                "target_id": "article",
                "target_type": "node_type",
                "target_uuid": "e4c4c0e0-df7b-4c7b-915a-296b0811d757"
            }
        ],
        "revision_timestamp": [
            {
                "value": "2020-02-25T02:34:56+00:00",
                "format": "Y-m-d\\TH:i:sP"
            }
        ],
        "revision_uid": [
            {
                "target_id": 1,
                "target_type": "user",
                "target_uuid": "2e458f1f-dd9a-4397-b0db-b33d6f6e8a02",
                "url": "/user/1"
            }
        ],
        "revision_log": [],
        "status": [
            {
                "value": true
            }
        ],
        "uid": [
            {
                "target_id": 1,
                "target_type": "user",
                "target_uuid": "2e458f1f-dd9a-4397-b0db-b33d6f6e8a02",
                "url": "/user/1"
            }
        ],
        "title": [
            {
                "value": "Test Article"
            }
        ],
        "created": [
            {
                "value": "2020-02-25T02:33:48+00:00",
                "format": "Y-m-d\\TH:i:sP"
            }
        ],
        "changed": [
            {
                "value": "2020-02-25T02:34:56+00:00",
                "format": "Y-m-d\\TH:i:sP"
            }
        ],
        "promote": [
            {
                "value": true
            }
        ],
        "sticky": [
            {
                "value": false
            }
        ],
        "default_langcode": [
            {
                "value": true
            }
        ],
        "revision_translation_affected": [
            {
                "value": true
            }
        ],
        "path": [
            {
                "alias": null,
                "pid": null,
                "langcode": "en"
            }
        ],
        "body": [
            {
                "value": "<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n",
                "format": "basic_html",
                "processed": "<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>",
                "summary": ""
            }
        ],
        "field_image": [
            {
                "target_id": 1,
                "target_type": "media",
                "target_uuid": "cb231240-5269-48c1-8c0f-286ab042aea0",
                "url": "/media/1/edit"
            }
        ],
        "field_tags": [
            {
                "target_id": 1,
                "target_type": "taxonomy_term",
                "target_uuid": "f0872e09-48b9-40ff-a81e-c257533d46e6",
                "url": "/taxonomy/term/1"
            }
        ]
    }
]
```
- `POST /api/article/{nid}` (Edit article)
*Set Data*
```$xslt
{
    "title": "My custom create title 123",
    "body": [
        {
            "value": "<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n",
            "format": "basic_html"
        }
    ],
    "field_image": [
        {
            "target_id": 1,
            "target_type": "media",
            "target_uuid": "cb231240-5269-48c1-8c0f-286ab042aea0",
            "url": "/media/1/edit"
        }
    ],
    "field_tags": [
        {
            "target_id": 1,
            "target_type": "taxonomy_term",
            "target_uuid": "f0872e09-48b9-40ff-a81e-c257533d46e6",
            "url": "/taxonomy/term/1"
        }
    ]
}
```
### This is a not fix problem with a DELETE Method [See Issuees](https://www.drupal.org/project/drupal/issues/2949017)
- `GET /api/article/{nid}/delete` (Delete article)
- `POST /api/article/create` (Create article)
*Set Data*
```$xslt
{
    "title": "New Article",
    "body": {
        "value": "Custom value"
    }
    ...
}
```