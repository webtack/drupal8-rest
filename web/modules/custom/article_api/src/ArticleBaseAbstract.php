<?php namespace Drupal\article_api;

use Drupal\Core\Entity\EntityInterface;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\Core\Session\AccountProxyInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpFoundation\Request;

abstract class ArticleBaseAbstract extends ResourceBase {
	protected $nodeType = 'article';
	
	/**
	 * A current user instance.
	 *
	 * @var \Drupal\Core\Session\AccountProxyInterface
	 */
	protected $currentUser;
	
	/**
	 * The request object that contains the parameters.
	 *
	 * @var \Symfony\Component\HttpFoundation\Request
	 */
	protected $request;
	
	/**
	 * Constructs a new object.
	 *
	 * @param array $configuration
	 *   A configuration array containing information about the plugin instance.
	 * @param string $plugin_id
	 *   The plugin_id for the plugin instance.
	 * @param mixed $plugin_definition
	 *   The plugin implementation definition.
	 * @param array $serializer_formats
	 *   The available serialization formats.
	 * @param \Psr\Log\LoggerInterface $logger
	 *   A logger instance.
	 * @param \Symfony\Component\HttpFoundation\Request $request
	 *   The request object.
	 * @param \Drupal\Core\Session\AccountProxyInterface $current_user
	 *   A current user instance.
	 */
	public function __construct(
		array $configuration,
		$plugin_id,
		$plugin_definition,
		array $serializer_formats,
		LoggerInterface $logger,
		AccountProxyInterface $current_user,
		Request $request) {
		parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);
		$this->request = $request;
		$this->currentUser = $current_user;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
		return new static(
			$configuration,
			$plugin_id,
			$plugin_definition,
			$container->getParameter('serializer.formats'),
			$container->get('logger.factory')->get('my_custom_log'),
			$container->get('current_user'),
			$container->get('request_stack')->getCurrentRequest()
		);
	}
	
	/**
	 * @param int $nid
	 * @return \Drupal\Core\Entity\EntityInterface|null
	 */
	protected function getArticle(int $nid) {
		// Get a node storage object.
		$node_storage = \Drupal::entityManager()->getStorage('node');
		$node = $node_storage->load($nid);
		
		return $node;
	}
	
	/**
	 * @param \Drupal\Core\Entity\EntityInterface|null $node
	 * @return bool
	 */
	protected function articleIsValid($node) {		
		return !is_null($node) && $node->getType() === $this->nodeType;
	}
	
	/**
	 * @param $nid
	 * @return \Drupal\rest\ResourceResponse
	 */
	protected function articleNotFoundResponse($nid) {
		return new ResourceResponse([
			'message' => "Article::{$nid} not found",
			'status'  => 404,
		], 404);
	}
}