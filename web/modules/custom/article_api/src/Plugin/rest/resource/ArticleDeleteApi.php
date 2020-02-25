<?php

namespace Drupal\article_api\Plugin\rest\resource;

use Drupal\article_api\ArticleBaseAbstract;
use Drupal\node\Entity\Node;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @RestResource(
 *   id = "article_delete_api_resource",
 *   label = @Translation("Article Delete API"),
 *   uri_paths = {
 *     "canonical" = "/api/article/{nid}/delete",
 *   }
 * )
 */
class ArticleDeleteApi extends ArticleBaseAbstract {
	
	/**
	 * Responds to entity DELETE requests.
	 *
	 * @param $nid
	 * @return \Drupal\rest\ResourceResponse
	 */
	public function get($nid) {
		// Get a node storage object.
		$node = $this->getArticle($nid);
	
		if(!$this->articleIsValid($node)) {
			return $this->articleNotFoundResponse($nid);
		}
		$title = $node->title->value;
		$node->delete();
		
		return new ResourceResponse(['message' => "Article::{$title} deleted success"]);
	}
	
}
