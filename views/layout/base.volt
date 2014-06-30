<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/css/style.css" />
        <title>{% block title %}{% endblock %}</title>
    </head>
    <body>
        {% block content %}{% endblock %}
        <p>You can access your short url by using <strong>/{short}</strong></p>
    </body>
</html>