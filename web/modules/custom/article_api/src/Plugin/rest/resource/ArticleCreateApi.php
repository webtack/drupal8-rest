<?php

namespace Drupal\article_api\Plugin\rest\resource;

use Drupal\article_api\ArticleBaseAbstract;
use Drupal\rest\ResourceResponse;

/**
 * @RestResource(
 *   id = "article_create_api_resource",
 *   label = @Translation("Article Create API"),
 *   uri_paths = {
 *     "create" = "/api/article/create",
 *   }
 * )
 */
class ArticleCreateApi extends ArticleBaseAbstract {
	
	
	
	/**
	 * Responds to entity GET requests.
	 *
	 * @return \Drupal\rest\ResourceResponse
	 */
	public function post($data) {
		
		if($data) {
			$data['type'] = $this->nodeType;
			$node = \Drupal\node\Entity\Node::create($data);
		}
		
		$node->save();
		
		return new ResourceResponse([
			'article' => $node,
			'message' => "Article '{$node->title->value}' created success"
		]);
	}
	
}
