<?php
/*
 * Copyright 2022 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/retail/v2alpha/search_service.proto
 * Updates to the above are reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\Retail\V2alpha\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Retail\V2alpha\SearchRequest;
use Google\Cloud\Retail\V2alpha\SearchRequest\BoostSpec;
use Google\Cloud\Retail\V2alpha\SearchRequest\DynamicFacetSpec;
use Google\Cloud\Retail\V2alpha\SearchRequest\FacetSpec;
use Google\Cloud\Retail\V2alpha\SearchRequest\QueryExpansionSpec;
use Google\Cloud\Retail\V2alpha\SearchRequest\RelevanceThreshold;
use Google\Cloud\Retail\V2alpha\UserInfo;
use Google\Protobuf\Internal\Message;

/**
 * Service Description: Service for search.
 *
 * This feature is only available for users who have Retail Search enabled.
 * Please submit a form [here](https://cloud.google.com/contact) to contact
 * cloud sales if you are interested in using Retail Search.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $searchServiceClient = new SearchServiceClient();
 * try {
 *     $placement = 'placement';
 *     $visitorId = 'visitor_id';
 *     // Iterate over pages of elements
 *     $pagedResponse = $searchServiceClient->search($placement, $visitorId);
 *     foreach ($pagedResponse->iteratePages() as $page) {
 *         foreach ($page as $element) {
 *             // doSomethingWith($element);
 *         }
 *     }
 *     // Alternatively:
 *     // Iterate through all elements
 *     $pagedResponse = $searchServiceClient->search($placement, $visitorId);
 *     foreach ($pagedResponse->iterateAllElements() as $element) {
 *         // doSomethingWith($element);
 *     }
 * } finally {
 *     $searchServiceClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @experimental
 */
class SearchServiceGapicClient
{
    use GapicClientTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'google.cloud.retail.v2alpha.SearchService';

    /** The default address of the service. */
    const SERVICE_ADDRESS = 'retail.googleapis.com';

    /** The default port of the service. */
    const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];

    private static $branchNameTemplate;

    private static $pathTemplateMap;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'serviceAddress' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/search_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/search_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/search_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/search_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getBranchNameTemplate()
    {
        if (self::$branchNameTemplate == null) {
            self::$branchNameTemplate = new PathTemplate('projects/{project}/locations/{location}/catalogs/{catalog}/branches/{branch}');
        }

        return self::$branchNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (self::$pathTemplateMap == null) {
            self::$pathTemplateMap = [
                'branch' => self::getBranchNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent a branch
     * resource.
     *
     * @param string $project
     * @param string $location
     * @param string $catalog
     * @param string $branch
     *
     * @return string The formatted branch resource.
     *
     * @experimental
     */
    public static function branchName($project, $location, $catalog, $branch)
    {
        return self::getBranchNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'catalog' => $catalog,
            'branch' => $branch,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - branch: projects/{project}/locations/{location}/catalogs/{catalog}/branches/{branch}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     *
     * @experimental
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();
        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }

        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'retail.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $serviceAddress setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     * }
     *
     * @throws ValidationException
     *
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * ```
     * $searchServiceClient = new SearchServiceClient();
     * $request = new SearchRequest();
     * try {
     *     $response = $searchServiceClient->sendAsync('search', $request)->wait();
     * } finally {
     *     $searchServiceClient->close();
     * }
     * ```
     *
     * @param string  $methodName   Name of the client method to be executed.
     * @param Message $request      Request message payload.
     * @param array   $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     */
    public function sendAsync(string $methodName, Message $request, array $optionalArgs = [])
    {
        return $this->startAsyncCall($methodName, $request, $optionalArgs);
    }

    /**
     * Performs a search.
     *
     * This feature is only available for users who have Retail Search enabled.
     * Please submit a form [here](https://cloud.google.com/contact) to contact
     * cloud sales if you are interested in using Retail Search.
     *
     * Sample code:
     * ```
     * $searchServiceClient = new SearchServiceClient();
     * try {
     *     $placement = 'placement';
     *     $visitorId = 'visitor_id';
     *     // Iterate over pages of elements
     *     $pagedResponse = $searchServiceClient->search($placement, $visitorId);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *     // Alternatively:
     *     // Iterate through all elements
     *     $pagedResponse = $searchServiceClient->search($placement, $visitorId);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $searchServiceClient->close();
     * }
     * ```
     *
     * To invoke this method asynchronously {@see sendAsync}.
     *
     * @param string $placement    Required. The resource name of the search engine placement, such as
     *                             `projects/&#42;/locations/global/catalogs/default_catalog/placements/default_search`.
     *                             This field is used to identify the set of models that will be used to make
     *                             the search.
     *
     *                             We currently support one placement with the following ID:
     *
     *                             * `default_search`.
     * @param string $visitorId    Required. A unique identifier for tracking visitors. For example, this
     *                             could be implemented with an HTTP cookie, which should be able to uniquely
     *                             identify a visitor on a single device. This unique identifier should not
     *                             change if the visitor logs in or out of the website.
     *
     *                             The field must be a UTF-8 encoded string with a length limit of 128
     *                             characters. Otherwise, an INVALID_ARGUMENT error is returned.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type string $branch
     *           The branch resource name, such as
     *           `projects/&#42;/locations/global/catalogs/default_catalog/branches/0`.
     *
     *           Use "default_branch" as the branch ID or leave this field empty, to search
     *           products under the default branch.
     *     @type string $query
     *           Raw search query.
     *     @type UserInfo $userInfo
     *           User information.
     *     @type int $pageSize
     *           The maximum number of resources contained in the underlying API
     *           response. The API may return fewer values in a page, even if
     *           there are additional values to be retrieved.
     *     @type string $pageToken
     *           A page token is used to specify a page of values to be returned.
     *           If no page token is specified (the default), the first page
     *           of values will be returned. Any page token used here must have
     *           been generated by a previous call to the API.
     *     @type int $offset
     *           A 0-indexed integer that specifies the current offset (that is, starting
     *           result location, amongst the
     *           [Product][google.cloud.retail.v2alpha.Product]s deemed by the API as
     *           relevant) in search results. This field is only considered if
     *           [page_token][google.cloud.retail.v2alpha.SearchRequest.page_token] is
     *           unset.
     *
     *           If this field is negative, an INVALID_ARGUMENT is returned.
     *     @type string $filter
     *           The filter syntax consists of an expression language for constructing a
     *           predicate from one or more fields of the products being filtered. Filter
     *           expression is case-sensitive.
     *
     *           If this field is unrecognizable, an INVALID_ARGUMENT is returned.
     *     @type string $canonicalFilter
     *           The filter applied to every search request when quality improvement such as
     *           query expansion is needed. For example, if a query does not have enough
     *           results, an expanded query with
     *           [SearchRequest.canonical_filter][google.cloud.retail.v2alpha.SearchRequest.canonical_filter]
     *           will be returned as a supplement of the original query. This field is
     *           strongly recommended to achieve high search quality.
     *
     *           See
     *           [SearchRequest.filter][google.cloud.retail.v2alpha.SearchRequest.filter]
     *           for more details about filter syntax.
     *     @type string $orderBy
     *           The order in which products are returned. Products can be ordered by
     *           a field in an [Product][google.cloud.retail.v2alpha.Product] object. Leave
     *           it unset if ordered by relevance. OrderBy expression is case-sensitive.
     *
     *           If this field is unrecognizable, an INVALID_ARGUMENT is returned.
     *     @type FacetSpec[] $facetSpecs
     *           Facet specifications for faceted search. If empty, no facets are returned.
     *
     *           A maximum of 100 values are allowed. Otherwise, an INVALID_ARGUMENT error
     *           is returned.
     *     @type DynamicFacetSpec $dynamicFacetSpec
     *           The specification for dynamically generated facets. Notice that only
     *           textual facets can be dynamically generated.
     *
     *           This feature requires additional allowlisting. Contact Retail Search
     *           support team if you are interested in using dynamic facet feature.
     *     @type BoostSpec $boostSpec
     *           Boost specification to boost certain products.
     *     @type QueryExpansionSpec $queryExpansionSpec
     *           The query expansion specification that specifies the conditions under which
     *           query expansion will occur..
     *     @type int $relevanceThreshold
     *           The relevance threshold of the search results.
     *
     *           Defaults to
     *           [RelevanceThreshold.HIGH][google.cloud.retail.v2alpha.SearchRequest.RelevanceThreshold.HIGH],
     *           which means only the most relevant results are shown, and the least number
     *           of results are returned.
     *           For allowed values, use constants defined on {@see \Google\Cloud\Retail\V2alpha\SearchRequest\RelevanceThreshold}
     *     @type string[] $variantRollupKeys
     *           The keys to fetch and rollup the matching
     *           [variant][google.cloud.retail.v2alpha.Product.Type.VARIANT]
     *           [Product][google.cloud.retail.v2alpha.Product]s attributes. The attributes
     *           from all the matching
     *           [variant][google.cloud.retail.v2alpha.Product.Type.VARIANT]
     *           [Product][google.cloud.retail.v2alpha.Product]s are merged and
     *           de-duplicated. Notice that rollup
     *           [variant][google.cloud.retail.v2alpha.Product.Type.VARIANT]
     *           [Product][google.cloud.retail.v2alpha.Product]s attributes will lead to
     *           extra query latency. Maximum number of keys is 10.
     *
     *           For [FulfillmentInfo][google.cloud.retail.v2alpha.FulfillmentInfo], a
     *           fulfillment type and a fulfillment ID must be provided in the format of
     *           "fulfillmentType.fulfillmentId". E.g., in "pickupInStore.store123",
     *           "pickupInStore" is fulfillment type and "store123" is the store ID.
     *
     *           Supported keys are:
     *
     *           * colorFamilies
     *           * price
     *           * originalPrice
     *           * discount
     *           * attributes.key, where key is any key in the
     *           [Product.attributes][google.cloud.retail.v2alpha.Product.attributes] map.
     *           * pickupInStore.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "pickup-in-store".
     *           * shipToStore.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "ship-to-store".
     *           * sameDayDelivery.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "same-day-delivery".
     *           * nextDayDelivery.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "next-day-delivery".
     *           * customFulfillment1.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "custom-type-1".
     *           * customFulfillment2.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "custom-type-2".
     *           * customFulfillment3.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "custom-type-3".
     *           * customFulfillment4.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "custom-type-4".
     *           * customFulfillment5.id, where id is any
     *           [FulfillmentInfo.place_ids][google.cloud.retail.v2alpha.FulfillmentInfo.place_ids]
     *           for
     *           [FulfillmentInfo.type][google.cloud.retail.v2alpha.FulfillmentInfo.type]
     *           "custom-type-5".
     *
     *           If this field is set to an invalid value other than these, an
     *           INVALID_ARGUMENT error is returned.
     *     @type string[] $pageCategories
     *           The categories associated with a category page. Required for category
     *           navigation queries to achieve good search quality. The format should be
     *           the same as
     *           [UserEvent.page_categories][google.cloud.retail.v2alpha.UserEvent.page_categories];
     *
     *           To represent full path of category, use '>' sign to separate different
     *           hierarchies. If '>' is part of the category name, please replace it with
     *           other character(s).
     *
     *           Category pages include special pages such as sales or promotions. For
     *           instance, a special sale page may have the category hierarchy:
     *           "pageCategories" : ["Sales > 2017 Black Friday Deals"].
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function search($placement, $visitorId, array $optionalArgs = [])
    {
        $request = new SearchRequest();
        $request->setPlacement($placement);
        $request->setVisitorId($visitorId);
        if (isset($optionalArgs['branch'])) {
            $request->setBranch($optionalArgs['branch']);
        }

        if (isset($optionalArgs['query'])) {
            $request->setQuery($optionalArgs['query']);
        }

        if (isset($optionalArgs['userInfo'])) {
            $request->setUserInfo($optionalArgs['userInfo']);
        }

        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }

        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        if (isset($optionalArgs['offset'])) {
            $request->setOffset($optionalArgs['offset']);
        }

        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }

        if (isset($optionalArgs['canonicalFilter'])) {
            $request->setCanonicalFilter($optionalArgs['canonicalFilter']);
        }

        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }

        if (isset($optionalArgs['facetSpecs'])) {
            $request->setFacetSpecs($optionalArgs['facetSpecs']);
        }

        if (isset($optionalArgs['dynamicFacetSpec'])) {
            $request->setDynamicFacetSpec($optionalArgs['dynamicFacetSpec']);
        }

        if (isset($optionalArgs['boostSpec'])) {
            $request->setBoostSpec($optionalArgs['boostSpec']);
        }

        if (isset($optionalArgs['queryExpansionSpec'])) {
            $request->setQueryExpansionSpec($optionalArgs['queryExpansionSpec']);
        }

        if (isset($optionalArgs['relevanceThreshold'])) {
            $request->setRelevanceThreshold($optionalArgs['relevanceThreshold']);
        }

        if (isset($optionalArgs['variantRollupKeys'])) {
            $request->setVariantRollupKeys($optionalArgs['variantRollupKeys']);
        }

        if (isset($optionalArgs['pageCategories'])) {
            $request->setPageCategories($optionalArgs['pageCategories']);
        }

        return $this->startApiCall('Search', $request, $optionalArgs);
    }
}
