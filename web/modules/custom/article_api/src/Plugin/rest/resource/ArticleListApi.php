<?php

namespace Drupal\article_api\Plugin\rest\resource;

use Drupal\article_api\ArticleBaseAbstract;
use Drupal\rest\ResourceResponse;

/**
 * @RestResource(
 *   id = "article_list_api_resource",
 *   label = @Translation("Article List API"),
 *   uri_paths = {
 *     "canonical" = "/api/article/list",
 *   }
 * )
 */
class ArticleListApi extends ArticleBaseAbstract {
	
	
	
	/**
	 * Responds to entity GET requests.
	 *
	 * @return \Drupal\rest\ResourceResponse
	 */
	public function get() {
		
		return new ResourceResponse(['List']);
	}
	
}
