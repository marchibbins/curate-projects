{% extends "base.twig" %}

{% block content %}
		<div class="content-wrapper">
			<article class="post-type-{{post.post_type}}" id="post-{{post.ID}}">
				<section class="article-content">
				  <h1 class="article-h1">{{post.title}}</h1>
          {% for child in post.children('page') %}
          <div class="{% if loop.first != true %}u-hidden{% endif %}">
						{{child.content}}
					</div>
          {% endfor %}
				</section>
			</article>
		</div><!-- /content-wrapper -->
	</div>
{% endblock %}
