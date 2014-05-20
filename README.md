# Social share plugin

This plugin adds social share features to your [OctoberCMS](http://octobercms.com) blog post.

To add the plugin's share code to your website just drop the Share component to your CMS blog post and add this code to the layout code after the blog post tag:

```php
    {% if not blogPost %}
    <h2>Post not found</h2>
	{% else %}
	    <h2>{{ blogPost.title }}</h2>

	    {% component 'post' %}
	    {% component 'shares' %}
	{% endif %}
```

## Supported

 * Facebook
 * Twitter
 * Google Plus