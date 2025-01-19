## Description

Elevate your website analytics with the DataLayer plugin!
This robust plugin creates a fully populated and standardized dataLayer object, ensuring seamless integration with both Google Tag Manager and Matomo Tag Manager.

- Instant Setup: Automatically generates and populates a dataLayer object with essential website and user interaction data.
- Universal Compatibility: Works flawlessly with Google Tag Manager and Matomo Tag Manager, making it easier to manage your tagging needs.
- Customizable Data: Easily add or modify data points to fit your specific tracking requirements.
- Performance Optimized: Lightweight and optimized for speed to ensure your site remains fast and responsive.

### Archive page `dataLayer` structure

Easy access to your archive data with a standard event name and subject.

```javascript
{
    "event": "view_archive_date", //_date may be replaces with _tax value
    "page": {
        "type": "archive",
        "title": "january 2025 - Example",
        "url": "https://example.com/2025/01",
        "path": "2025/01",
        "locale": "en_US",
        "archive_type": "date",
        "taxonomy": false,
        "post_type": false,
        "date": {
            "year": 2025,
            "month": 1,
            "day": null
        }
    }
}
```

### Author page `dataLayer` structure

Easy access to all author details on his archive page.

```javascript
{
    "event": "view_author",
    "page": {
        "id": 1,
        "nickname": "openmost",
        "display_name": "openmost",
        "first_name": "Ronan",
        "last_name": "HELLO",
        "description": "The creator of this super plugin",
        "type": "author",
        "url": "https://example.com/author/openmost",
        "path": "author/openmost",
        "title": "Author: openmost"
    }
}
```

### Error page `dataLayer` structure

This `dataLayer` structure allows you to easily track the 404 error and detect the referring page that led to this error.
What a great trick yeah?

```javascript
{
    "event": "view_error_404",
    "page": {
        "type": "error",
        "title": "Page not found - Website",
        "url": "https://example.com/url-that-encountered-a-404-error",
        "path": "/url-that-encountered-a-404-error",
        "locale": "en_US",
        "error_type": "404",
        "http_status_code": 404
    }
}
```

### Search results page `dataLayer` structure

The search key in this object allows you to get the search term and total results to detect invalid searches.
Very useful for Matomo Tag Manager, and nice hack for Google Tag Manager.

```javascript
{
    "event": "view_search_results",
    "page": {
        "type": "search",
        "url": "https://example.com",
        "path": "",
        "title": "You searched for Demo - Example",
        "locale": "en_US"
    },
    "search": {
        "search": "Demo",
        "search_cat": "",
        "search_count": 3,
        "query": "Demo",
        "found_posts": 3,
        "post_count": 3
    }
}
```

### Home, Post Type `dataLayer` structure (blog posts, custom post type single page)

The following structure is generated for a single post page, but it automatically adapts to your custom post type, page, etc.

```javascript
{
    "event": "view_single_post",
    "page": {
        "type": "post",
        "id": 1,
        "url": "https://example.com/blog/super-article-path",
        "path": "/blog/super-article-path",
        "title": "Super article title | Example",
        "locale": "en_US",
        "is_home": false,
        "is_front_page": false,
        "post_name": "super-article-path",
        "post_title": "Super article title",
        "post_excerpt": "",
        "post_status": "publish",
        "post_date": "2024-08-17 13:30:00",
        "post_date_gmt": "2024-08-17 13:30:00",
        "post_modified": "2024-08-17 13:30:00",
        "post_modified_gmt": "2024-08-17 13:30:00",
        "post_type_name": "post",
        "post_type_label": "Posts",
        "post_type": {
            "name": "post",
            "label": "Posts",
            "label_singular": "Post",
            "label_plural": "Posts",
            "description": "The super post type description"
        },
        "guid": "https://example.com/?p=1",
        "post_mime_type": false,
        "comment_status": "open",
        "comment_count": "0",
        "author": {
            "id": 1,
            "nickname": "openmost",
            "display_name": "openmost",
            "first_name": "Ronan",
            "last_name": "HELLO",
            "description": "The creator of this super plugin"
        },
        "taxonomies": {
            "category": {
                "name": "category",
                "label": "Catégories",
                "description": "",
                "object_type": [
                    "post"
                ],
                "terms": {
                    "Uncategorized": {
                        "term_id": 1,
                        "slug": "uncategorized",
                        "name": "Uncategorized",
                        "term_group": 0,
                        "term_taxonomy_id": 1,
                        "taxonomy": "category",
                        "description": "",
                        "parent": 0,
                        "count": 1,
                        "filter": "raw"
                    }
                },
                "primary_term": [] //Filled only with YoastSEO plugin
            }
        },
        "category": [
            "Uncategorized"
        ],
        "page_template": ""
    }
}
```

### Term and taxonomy page `dataLayer` structure



```javascript
{
    "event": "view_archive_category", // this event name changed for every taxonomy
    "page": {
        "type": "archive",
        "title": "Uncategorized archives - Example",
        "url": "https://example.com/blog/category/uncategorized",
        "path": "blog/category/uncategorized",
        "locale": "en_US",
        "archive_type": "taxonomy",
        "taxonomy": "category",
        "post_type": "category",
        "date": {
            "year": null,
            "month": null,
            "day": null
        }
    }
}
```

### Pagination `dataLayer` structure

The `pagination` object structure is automatically added to all pages that have pagination.

Easy access to your pagination data, detect if users are using your pagination as much as you want.

```javascript
{
    pagination: {
        "posts_per_page": 10,
        "post_count": 1,
        "paged": true,
        "page_number": 2,
        "max_num_pages": 5
    }
}
```

### Authenticated user `dataLayer` structure

The `user` object is automatically added to all page when user is logged in.

User hashed data with SHA256 is very useful for GDPR consent with Google Ads services and user provided data.

```javascript
{
    user: {
        "id": 1,
        "user_login": "openmost",
        "user_nicename": "Openmost",
        "user_email": "no-reply@openmost.io",
        "user_registered": "2024-01-01 12:00:00",
        "display_name": "openmost",
        "roles": [
            "administrator"
        ],
        "sha256_id": "6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b",
        "sha256_user_login": "b2754b994c2fb636d1943ac0170f4ea192a891fb0f09cfdd100a9ffa983f053d",
        "sha256_user_email": "679d031c25e557ee84ca86ecaf333ccd8d3d1a3900ee728da83d79a819daf535"
    }
}
```

### Plugin : Contact Form 7 `dataLayer` structure

This plugin automatically detects the use of WP Contact Form 7.
No configuration needed.

Form submitted

```javascript
{
    "event": "wpcf7_submit",
    "wpcf7_form_id": 145,
    "wpcf7_form_detail": {} // See wpcf7_form_details below
}
```

Form with invalid fields

```javascript
{
    "event": "wpcf7_invalid",
    "wpcf7_form_id": 145,
    "wpcf7_form_detail": {} // See wpcf7_form_details below
}
```

Form spamming detected

```javascript
{
    "event": "wpcf7_spam",
    "wpcf7_form_id": 145, 
    "wpcf7_form_detail": {} // See wpcf7_form_details below
}
```

Email sent successfully

```javascript
{
    "event": "wpcf7_mail_sent",
    "wpcf7_form_id": 145, 
    "wpcf7_form_detail": {} // See wpcf7_form_details below
}
```

Failed to send mail

```javascript
{
    "event": "wpcf7_mail_failed",
    "wpcf7_form_id": 145, 
    "wpcf7_form_detail": {} // See wpcf7_form_details below
}
```

As each event handles `wpcf7_form_details`, here is an example of the object values ​​when the form is submitted with invalid fields.

```javascript
"wpcf7_form_detail": {
        "contactFormId": 145,
        "pluginVersion": "6.0.3",
        "contactFormLocale": "en_US",
        "unitTag": "wpcf7-xxxxxx",
        "containerPostId": 0,
        "status": "validation_failed",
        "inputs": [
            {
                "name": "your-message",
                "value": ""
            },
            {
                "name": "your-name",
                "value": ""
            },
            // All other inputs
        ],
        "formData": {},
        "apiResponse": {
            "contact_form_id": 145,
            "status": "validation_failed",
            "message": "One or more fields contain an error. Please check and try again.",
            "invalid_fields": [
                {
                    "field": "your-name",
                    "message": "Please complete this field..",
                    "idref": "last_name",
                    "error_id": "wpcf7-f145-o1-ve-your-name"
                },
                {
                    "field": "your-first-name",
                    "message": "Please complete this field.",
                    "idref": "first_name",
                    "error_id": "wpcf7-f145-o1-ve-your-first-name"
                },
                // All other invalid fields
            ],
            "posted_data_hash": "",
            "into": "#wpcf7-f145-o1"
        }
    }
```

### Plugin : WP Forms `dataLayer` structure

```javascript
{
    event: 'wp_forms_submit', 
    wp_forms_form_detail: {} // the HTML tag found in DOM
}
```


## Installation

To start using the dataLayer plugin, you need to install it from the marketplace or manually.
Then activate the plugin in the WordPress administration.
You don't need to configure anything special for standard use.
Once the plugin is activated, you will need to understand the different structures of the generated `dataLayer` object.

In your favorite Tag Manager:

- To trigger a tag at a specific moment, you will need to create a trigger based on the value of the `event` key of the desired page.
- To read values from the `dataLayer` object and report them to your audience analysis tools, you will need to create custom variables of the "data layer" type and enter the full path.

Example of configuring a variable:
for a following `datalayer` object:

```javascript
{
    "event": "view_single_post",
    "page": {
        "type": "post",
        "id": 1,
        "url": "https://example.com/blog/super-article-path",
        "path": "/blog/super-article-path",
        "title": "Super article title | Example",
        "post_type": {
            "name": "post",
            "label": "Posts",
            "label_singular": "Post",
            "label_plural": "Posts",
            "description": "The super post type description"
        }
    }
}
```

To collect the post type label, you will need to enter the value `page.post_type.label` in your custom variable.
This variable should be triggered with a custom trigger based on the custom event `view_single_post`.

Job done !

## Frequently Asked Questions

### Is this plugin compatible with Google Tag Manager?

Yes of course, this plugin fills the data in the `dataLayer` object by default for GTM

### Is this plugin compatible with Matomo Tag Manager?

Yes, even though this plugin fills data into the `dataLayer` object by default for GTM, your Matomo Tag Manager instance is able to read this data if you enable the container option: "Actively sync from Google data layer Tag Manager".
NO specific configuration required.
(Your Matomo instance must be at least updated to Matomo >=5.2.0)

### Is it possible to change the default dataLayer structure?

Yes, you can use all filters and actions available in the plugin source code to extend and adapt this plugin to your needs.

### How to visualize the contents of the data layer?

If you want to check what data is available in the dataLayer, you can open your console tab (F12) in your browser.
Then type `dataLayer` and press the “Enter” key.
Your browser displays the `dataLayer` object with all the data it contains.

You can also use the Tag Assistant tool from Google to visualise your `dataLayer` with ease in a fancy user interace.

### How to track forms submission using this plugin?

If your website uses the WP Contact Form 7 or WP Forms plugin, this plugin will automatically detect form events.
The list of all events is available in the documentation of this plugin.

Contact Form 7 sent mail event is `wpcf7_mail_sent`

WP Forms form submit event is `wp_forms_submit`

## Screenshots



## Changelog

### 1.0.1
Release data: 2025-01-17

Create documentation

### 1.0.0
Release date: 2024-11-18

Plugin first release, enjoy all the features !
