# Social share plugin

This plugin adds social share features to your [OctoberCMS](http://octobercms.com) blog post.

## Installation
1. In the backend panel, go to `System -> Updates`.
2. In the box to the left of `Install Plugin`, type `Hariadi.Share`
3. Click `Install Plugin`.

> Social Share for Blog Post required the [RainLab Blog](http://octobercms.com/plugin/rainlab-blog) plugin. The plugin was tested with with default `demo` theme.

## Adding the share button to Blog Post

To add the plugin's share code to your website just drop the `Share Component` to your CMS page or blog post and add `{% component 'shares' %}` code to after the page/blog post tag:

### Page
```
title = "Example"
url = "/example"

[shares]
==
<h1>Example</h1>
<p>Example how to adding share button to page.</p>
{% component 'shares' %}
```

### Blog Post
Example from [RainLab Blog](http://octobercms.com/plugin/rainlab-blog#documentation)

```php
title = "Blog Post"
url = "/blog/post/:slug"
layout = "default"

[blogPost post]
paramId = "slug"

[shares]
==
<?php
function onEnd()
{
    // Optional - set the page title to the post title
    if (isset($this['blogPost']))
        $this->page->title = $this['blogPost']->title;
}
?>
==
{% if not blogPost %}
    <h2>Post not found</h2>
{% else %}
    <h2>{{ blogPost.title }}</h2>

    {% component 'post' %}
    {% component 'shares' %}
{% endif %}
```

## Manage Social Share Plugin
You can enable/disable social media provider in the back panel, go to `System -> Settings` and look for the section named `Social Share`.

## Supported

 * Facebook
 * Twitter
 * Google Plus
 * .. more to come! [Request](https://github.com/hariadi/oc-share-plugin/issues/new)