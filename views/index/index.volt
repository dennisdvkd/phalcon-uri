{% extends "layout/base.volt" %}

{% block title %}Welcome{% endblock %}
{% block content %}
<h1>URI Shortener</h1>
<form action="/" method="post">
<label for="url">Url<label><input type="text" name="url">
<input type="submit" name="submit" value="Short this url">
</form>
{% endblock %}