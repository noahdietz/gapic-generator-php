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
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/asset/v1/asset_service.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\Asset\V1\Client\BaseClient;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\LongRunning\OperationsClient;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Asset\V1\AnalyzeIamPolicyLongrunningRequest;
use Google\Cloud\Asset\V1\AnalyzeIamPolicyRequest;
use Google\Cloud\Asset\V1\AnalyzeIamPolicyResponse;
use Google\Cloud\Asset\V1\AnalyzeMoveRequest;
use Google\Cloud\Asset\V1\AnalyzeMoveResponse;
use Google\Cloud\Asset\V1\BatchGetAssetsHistoryRequest;
use Google\Cloud\Asset\V1\BatchGetAssetsHistoryResponse;
use Google\Cloud\Asset\V1\CreateFeedRequest;
use Google\Cloud\Asset\V1\DeleteFeedRequest;
use Google\Cloud\Asset\V1\ExportAssetsRequest;
use Google\Cloud\Asset\V1\Feed;
use Google\Cloud\Asset\V1\GetFeedRequest;
use Google\Cloud\Asset\V1\ListAssetsRequest;
use Google\Cloud\Asset\V1\ListFeedsRequest;
use Google\Cloud\Asset\V1\ListFeedsResponse;
use Google\Cloud\Asset\V1\SearchAllIamPoliciesRequest;
use Google\Cloud\Asset\V1\SearchAllResourcesRequest;
use Google\Cloud\Asset\V1\UpdateFeedRequest;
use Google\LongRunning\Operation;

/**
 * Service Description: Asset service definition.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 */
class AssetServiceBaseClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'google.cloud.asset.v1.AssetService';

    /** The default address of the service. */
    const SERVICE_ADDRESS = 'cloudasset.googleapis.com';

    /** The default port of the service. */
    const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../../resources/asset_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../../resources/asset_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../../resources/asset_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../../resources/asset_service_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Return an OperationsClient object with the same endpoint as $this.
     *
     * @return OperationsClient
     */
    public function getOperationsClient()
    {
        return $this->operationsClient;
    }

    /**
     * Resume an existing long running operation that was previously started by a long
     * running API method. If $methodName is not provided, or does not match a long
     * running API method, then the operation can still be resumed, but the
     * OperationResponse object will not deserialize the final response.
     *
     * @param string $operationName The name of the long running operation
     * @param string $methodName    The name of the method used to start the operation
     *
     * @return OperationResponse
     */
    public function resumeOperation($operationName, $methodName = null)
    {
        $options = isset($this->descriptors[$methodName]['longRunning']) ? $this->descriptors[$methodName]['longRunning'] : [];
        $operation = new OperationResponse($operationName, $this->getOperationsClient(), $options);
        $operation->reload();
        return $operation;
    }

    /**
     * Formats a string containing the fully-qualified path to represent a feed
     * resource.
     *
     * @param string $project
     * @param string $feed
     *
     * @return string The formatted feed resource.
     */
    public static function feedName($project, $feed)
    {
        return self::getPathTemplate('feed')->render([
            'project' => $project,
            'feed' => $feed,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a folder_feed
     * resource.
     *
     * @param string $folder
     * @param string $feed
     *
     * @return string The formatted folder_feed resource.
     */
    public static function folderFeedName($folder, $feed)
    {
        return self::getPathTemplate('folderFeed')->render([
            'folder' => $folder,
            'feed' => $feed,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * organization_feed resource.
     *
     * @param string $organization
     * @param string $feed
     *
     * @return string The formatted organization_feed resource.
     */
    public static function organizationFeedName($organization, $feed)
    {
        return self::getPathTemplate('organizationFeed')->render([
            'organization' => $organization,
            'feed' => $feed,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a project_feed
     * resource.
     *
     * @param string $project
     * @param string $feed
     *
     * @return string The formatted project_feed resource.
     */
    public static function projectFeedName($project, $feed)
    {
        return self::getPathTemplate('projectFeed')->render([
            'project' => $project,
            'feed' => $feed,
        ]);
    }

    private static function registerPathTemplates()
    {
        self::loadPathTemplates(__DIR__ . '/../../resources/asset_service_descriptor_config.php', self::SERVICE_NAME);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - feed: projects/{project}/feeds/{feed}
     * - folderFeed: folders/{folder}/feeds/{feed}
     * - organizationFeed: organizations/{organization}/feeds/{feed}
     * - projectFeed: projects/{project}/feeds/{feed}
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
     */
    public static function parseName($formattedName, $template = null)
    {
        return self::parseFormattedName($formattedName, $template);
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'cloudasset.googleapis.com:443'.
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
     *           $apiEndpoint setting, will be ignored.
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
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
        $this->operationsClient = $this->createOperationsClient($clientOptions);
    }

    /**
     * Analyzes IAM policies to answer which identities have what accesses on
     * which resources.
     *
     * @param AnalyzeIamPolicyRequest $request      A request to house fields associated with the call.
     * @param array                   $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return AnalyzeIamPolicyResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function analyzeIamPolicy(AnalyzeIamPolicyRequest $request, array $optionalArgs = []): AnalyzeIamPolicyResponse
    {
        return $this->startApiCall('AnalyzeIamPolicy', $request, $optionalArgs)->wait();
    }

    /**
     * Analyzes IAM policies asynchronously to answer which identities have what
     * accesses on which resources, and writes the analysis results to a Google
     * Cloud Storage or a BigQuery destination. For Cloud Storage destination, the
     * output format is the JSON format that represents a
     * [AnalyzeIamPolicyResponse][google.cloud.asset.v1.AnalyzeIamPolicyResponse]. This method implements the
     * [google.longrunning.Operation][google.longrunning.Operation], which allows you to track the operation
     * status. We recommend intervals of at least 2 seconds with exponential
     * backoff retry to poll the operation result. The metadata contains the
     * metadata for the long-running operation.
     *
     * @param AnalyzeIamPolicyLongrunningRequest $request      A request to house fields associated with the call.
     * @param array                              $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function analyzeIamPolicyLongrunning(AnalyzeIamPolicyLongrunningRequest $request, array $optionalArgs = []): OperationResponse
    {
        return $this->startApiCall('AnalyzeIamPolicyLongrunning', $request, $optionalArgs)->wait();
    }

    /**
     * Analyze moving a resource to a specified destination without kicking off
     * the actual move. The analysis is best effort depending on the user's
     * permissions of viewing different hierarchical policies and configurations.
     * The policies and configuration are subject to change before the actual
     * resource migration takes place.
     *
     * @param AnalyzeMoveRequest $request      A request to house fields associated with the call.
     * @param array              $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return AnalyzeMoveResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function analyzeMove(AnalyzeMoveRequest $request, array $optionalArgs = []): AnalyzeMoveResponse
    {
        return $this->startApiCall('AnalyzeMove', $request, $optionalArgs)->wait();
    }

    /**
     * Batch gets the update history of assets that overlap a time window.
     * For IAM_POLICY content, this API outputs history when the asset and its
     * attached IAM POLICY both exist. This can create gaps in the output history.
     * Otherwise, this API outputs history with asset in both non-delete or
     * deleted status.
     * If a specified asset does not exist, this API returns an INVALID_ARGUMENT
     * error.
     *
     * @param BatchGetAssetsHistoryRequest $request      A request to house fields associated with the call.
     * @param array                        $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return BatchGetAssetsHistoryResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function batchGetAssetsHistory(BatchGetAssetsHistoryRequest $request, array $optionalArgs = []): BatchGetAssetsHistoryResponse
    {
        return $this->startApiCall('BatchGetAssetsHistory', $request, $optionalArgs)->wait();
    }

    /**
     * Creates a feed in a parent project/folder/organization to listen to its
     * asset updates.
     *
     * @param CreateFeedRequest $request      A request to house fields associated with the call.
     * @param array             $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Feed
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createFeed(CreateFeedRequest $request, array $optionalArgs = []): Feed
    {
        return $this->startApiCall('CreateFeed', $request, $optionalArgs)->wait();
    }

    /**
     * Deletes an asset feed.
     *
     * @param DeleteFeedRequest $request      A request to house fields associated with the call.
     * @param array             $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deleteFeed(DeleteFeedRequest $request, array $optionalArgs = []): void
    {
        $this->startApiCall('DeleteFeed', $request, $optionalArgs)->wait();
    }

    /**
     * Exports assets with time and resource types to a given Cloud Storage
     * location/BigQuery table. For Cloud Storage location destinations, the
     * output format is newline-delimited JSON. Each line represents a
     * [google.cloud.asset.v1.Asset][google.cloud.asset.v1.Asset] in the JSON format; for BigQuery table
     * destinations, the output table stores the fields in asset proto as columns.
     * This API implements the [google.longrunning.Operation][google.longrunning.Operation] API
     * , which allows you to keep track of the export. We recommend intervals of
     * at least 2 seconds with exponential retry to poll the export operation
     * result. For regular-size resource parent, the export operation usually
     * finishes within 5 minutes.
     *
     * @param ExportAssetsRequest $request      A request to house fields associated with the call.
     * @param array               $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function exportAssets(ExportAssetsRequest $request, array $optionalArgs = []): OperationResponse
    {
        return $this->startApiCall('ExportAssets', $request, $optionalArgs)->wait();
    }

    /**
     * Gets details about an asset feed.
     *
     * @param GetFeedRequest $request      A request to house fields associated with the call.
     * @param array          $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Feed
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getFeed(GetFeedRequest $request, array $optionalArgs = []): Feed
    {
        return $this->startApiCall('GetFeed', $request, $optionalArgs)->wait();
    }

    /**
     * Lists assets with time and resource types and returns paged results in
     * response.
     *
     * @param ListAssetsRequest $request      A request to house fields associated with the call.
     * @param array             $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listAssets(ListAssetsRequest $request, array $optionalArgs = []): PagedListResponse
    {
        return $this->startApiCall('ListAssets', $request, $optionalArgs);
    }

    /**
     * Lists all asset feeds in a parent project/folder/organization.
     *
     * @param ListFeedsRequest $request      A request to house fields associated with the call.
     * @param array            $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return ListFeedsResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listFeeds(ListFeedsRequest $request, array $optionalArgs = []): ListFeedsResponse
    {
        return $this->startApiCall('ListFeeds', $request, $optionalArgs)->wait();
    }

    /**
     * Searches all IAM policies within the specified scope, such as a project,
     * folder, or organization. The caller must be granted the
     * `cloudasset.assets.searchAllIamPolicies` permission on the desired scope,
     * otherwise the request will be rejected.
     *
     * @param SearchAllIamPoliciesRequest $request      A request to house fields associated with the call.
     * @param array                       $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function searchAllIamPolicies(SearchAllIamPoliciesRequest $request, array $optionalArgs = []): PagedListResponse
    {
        return $this->startApiCall('SearchAllIamPolicies', $request, $optionalArgs);
    }

    /**
     * Searches all Cloud resources within the specified scope, such as a project,
     * folder, or organization. The caller must be granted the
     * `cloudasset.assets.searchAllResources` permission on the desired scope,
     * otherwise the request will be rejected.
     *
     * @param SearchAllResourcesRequest $request      A request to house fields associated with the call.
     * @param array                     $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function searchAllResources(SearchAllResourcesRequest $request, array $optionalArgs = []): PagedListResponse
    {
        return $this->startApiCall('SearchAllResources', $request, $optionalArgs);
    }

    /**
     * Updates an asset feed configuration.
     *
     * @param UpdateFeedRequest $request      A request to house fields associated with the call.
     * @param array             $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Feed
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function updateFeed(UpdateFeedRequest $request, array $optionalArgs = []): Feed
    {
        return $this->startApiCall('UpdateFeed', $request, $optionalArgs)->wait();
    }
}
