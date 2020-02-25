<?php

namespace Drupal\article_api\Plugin\rest\resource;

use Drupal\article_api\ArticleBaseAbstract;
use Drupal\node\Entity\Node;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @RestResource(
 *   id = "article_single_api_resource",
 *   label = @Translation("Article Single And Edit API"),
 *   uri_paths = {
 *     "canonical" = "/api/article/{nid}",
 *     "create" = "/api/article/{nid}"
 *   }
 * )
 */
class ArticleSingleApi extends ArticleBaseAbstract {
	
	
	/**
	 * Responds to entity GET requests.
	 *
	 * @param $nid
	 * @return \Drupal\rest\ResourceResponse
	 */
	public function get($nid) {
		$node = $this->getArticle($nid);
		
		if(!$this->articleIsValid($node)) {
			return $this->articleNotFoundResponse($nid);
		}
		
		return new ResourceResponse([$node]);
	}
	
	/**
	 * Responds to entity POST requests.
	 *
	 * @param $nid
	 * @return \Drupal\rest\ResourceResponse
	 */
	public function post($nid, $data) {
		$node = $this->getArticle($nid);
		
		if(!$this->articleIsValid($node)) {
			return $this->articleNotFoundResponse($nid);
		}		
		
		if($data) {
			foreach ($data as $field => $value) {
				$node->set($field, $value);
			}
		}
		
		$node->save();
		
		return new ResourceResponse([
			'message' => "Article '{$node->title->value}' update success"
		]);
	}
	
	/**
	 * Responds to entity DELETE requests.
	 *
	 * @param $nid
	 * @return \Drupal\rest\ResourceResponse
	 */
	public function delete($nid) {
		// Get a node storage object.
		$node = $this->getArticle($nid);
	
		if(!$this->articleIsValid($node)) {
			return $this->articleNotFoundResponse($nid);
		}
		
		$node->delete();
		
		return new ResourceResponse(['message' => "Article deleted success"]);
	}
	
}
