<?php
/*
 * Copyright 2024 Google LLC
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
 * https://github.com/googleapis/googleapis/blob/master/tests/Integration/apis/compute_small/v1/compute_small.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\Compute\V1\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Compute\V1\Address;
use Google\Cloud\Compute\V1\AddressAggregatedList;
use Google\Cloud\Compute\V1\AddressList;
use Google\Cloud\Compute\V1\AggregatedListAddressesRequest;
use Google\Cloud\Compute\V1\DeleteAddressRequest;
use Google\Cloud\Compute\V1\InsertAddressRequest;
use Google\Cloud\Compute\V1\ListAddressesRequest;
use Google\Cloud\Compute\V1\Operation;
use Google\Cloud\Compute\V1\RegionOperationsClient;

/**
 * Service Description:
 * Services
 *
 * The Addresses API.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $addressesClient = new AddressesClient();
 * try {
 *     $project = 'project';
 *     // Iterate over pages of elements
 *     $pagedResponse = $addressesClient->aggregatedList($project);
 *     foreach ($pagedResponse->iteratePages() as $page) {
 *         foreach ($page as $key => $element) {
 *             // doSomethingWith($element);
 *         }
 *     }
 *     // Alternatively:
 *     // Iterate through all elements
 *     $pagedResponse = $addressesClient->aggregatedList($project);
 *     foreach ($pagedResponse->iterateAllElements() as $element) {
 *         // doSomethingWith($element);
 *     }
 * } finally {
 *     $addressesClient->close();
 * }
 * ```
 *
 * @deprecated This class will be removed in the next major version update.
 */
class AddressesGapicClient
{
    use GapicClientTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'google.cloud.compute.v1.Addresses';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    const SERVICE_ADDRESS = 'compute.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'compute.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/compute',
        'https://www.googleapis.com/auth/cloud-platform',
    ];

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/addresses_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/addresses_descriptor_config.php',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
                'useJwtAccessWithScope' => false,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/addresses_rest_client_config.php',
                ],
            ],
            'operationsClientClass' => RegionOperationsClient::class,
        ];
    }

    /** Implements GapicClientTrait::defaultTransport. */
    private static function defaultTransport()
    {
        return 'rest';
    }

    /** Implements GapicClientTrait::supportedTransports. */
    private static function supportedTransports()
    {
        return [
            'rest',
        ];
    }

    /**
     * Return an RegionOperationsClient object with the same endpoint as $this.
     *
     * @return RegionOperationsClient
     */
    public function getOperationsClient()
    {
        return $this->operationsClient;
    }

    /** Return the default longrunning operation descriptor config. */
    private function getDefaultOperationDescriptor()
    {
        return [
            'additionalArgumentMethods' => [
                'getProject',
                'getRegion',
            ],
            'getOperationMethod' => 'get',
            'cancelOperationMethod' => null,
            'deleteOperationMethod' => null,
            'operationErrorCodeMethod' => 'getHttpErrorStatusCode',
            'operationErrorMessageMethod' => 'getHttpErrorMessage',
            'operationNameMethod' => 'getName',
            'operationStatusMethod' => 'getStatus',
            'operationStatusDoneValue' => \Google\Cloud\Compute\V1\Operation\Status::DONE,
        ];
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
        $options = isset($this->descriptors[$methodName]['longRunning']) ? $this->descriptors[$methodName]['longRunning'] : $this->getDefaultOperationDescriptor();
        $operation = new OperationResponse($operationName, $this->getOperationsClient(), $options);
        $operation->reload();
        return $operation;
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'compute.googleapis.com:443'.
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
     *           The transport used for executing network requests. At the moment, supports only
     *           `rest`. *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\RestTransport::build()} method for the
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
     * Retrieves an aggregated list of addresses.
     *
     * Sample code:
     * ```
     * $addressesClient = new AddressesClient();
     * try {
     *     $project = 'project';
     *     // Iterate over pages of elements
     *     $pagedResponse = $addressesClient->aggregatedList($project);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $key => $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *     // Alternatively:
     *     // Iterate through all elements
     *     $pagedResponse = $addressesClient->aggregatedList($project);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $addressesClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type string $filter
     *           A filter expression that filters resources listed in the response. The expression must specify the field name, a comparison operator, and the value that you want to use for filtering. The value must be a string, a number, or a boolean. The comparison operator must be either `=`, `!=`, `>`, or `<`.
     *
     *           For example, if you are filtering Compute Engine instances, you can exclude instances named `example-instance` by specifying `name != example-instance`.
     *
     *           You can also filter nested fields. For example, you could specify `scheduling.automaticRestart = false` to include instances only if they are not scheduled for automatic restarts. You can use filtering on nested fields to filter based on resource labels.
     *
     *           To filter on multiple expressions, provide each separate expression within parentheses. For example: ``` (scheduling.automaticRestart = true) (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND` expression. However, you can include `AND` and `OR` expressions explicitly. For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND (scheduling.automaticRestart = true) ```
     *     @type bool $includeAllScopes
     *           Indicates whether every visible scope for each scope type (zone, region, global) should be included in the response. For new resource types added after this field, the flag has no effect as new resource types will always include every visible scope for each scope type in response. For resource types which predate this field, if this flag is omitted or false, only scopes of the scope types where the resource type is expected to be found will be included.
     *     @type int $maxResults
     *           The maximum number of results per page that should be returned. If the number of available results is larger than `maxResults`, Compute Engine returns a `nextPageToken` that can be used to get the next page of results in subsequent list requests. Acceptable values are `0` to `500`, inclusive. (Default: `500`)
     *     @type string $orderBy
     *           Sorts list results by a certain order. By default, results are returned in alphanumerical order based on the resource name.
     *
     *           You can also sort results in descending order based on the creation timestamp using `orderBy="creationTimestamp desc"`. This sorts results based on the `creationTimestamp` field in reverse chronological order (newest result first). Use this to sort resources like operations so that the newest operation is returned first.
     *
     *           Currently, only sorting by `name` or `creationTimestamp desc` is supported.
     *     @type string $pageToken
     *           A page token is used to specify a page of values to be returned.
     *           If no page token is specified (the default), the first page
     *           of values will be returned. Any page token used here must have
     *           been generated by a previous call to the API.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function aggregatedList($project, array $optionalArgs = [])
    {
        $request = new AggregatedListAddressesRequest();
        $requestParamHeaders = [];
        $request->setProject($project);
        $requestParamHeaders['project'] = $project;
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }

        if (isset($optionalArgs['includeAllScopes'])) {
            $request->setIncludeAllScopes($optionalArgs['includeAllScopes']);
        }

        if (isset($optionalArgs['maxResults'])) {
            $request->setMaxResults($optionalArgs['maxResults']);
        }

        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }

        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->getPagedListResponse('AggregatedList', $optionalArgs, AddressAggregatedList::class, $request);
    }

    /**
     * Deletes the specified address resource.
     *
     * Sample code:
     * ```
     * $addressesClient = new AddressesClient();
     * try {
     *     $address = 'address';
     *     $project = 'project';
     *     $region = 'region';
     *     $operationResponse = $addressesClient->delete($address, $project, $region);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         // if creating/modifying, retrieve the target resource
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *     // Alternatively:
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $addressesClient->delete($address, $project, $region);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $addressesClient->resumeOperation($operationName, 'delete');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *         // if creating/modifying, retrieve the target resource
     *     } else {
     *         $error = $newOperationResponse->getError();
     *         // handleError($error)
     *     }
     * } finally {
     *     $addressesClient->close();
     * }
     * ```
     *
     * @param string $address      Name of the address resource to delete.
     * @param string $project      Project ID for this request.
     * @param string $region       Name of the region for this request.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type string $requestId
     *           An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *           For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *           The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function delete($address, $project, $region, array $optionalArgs = [])
    {
        $request = new DeleteAddressRequest();
        $requestParamHeaders = [];
        $request->setAddress($address);
        $request->setProject($project);
        $request->setRegion($region);
        $requestParamHeaders['address'] = $address;
        $requestParamHeaders['project'] = $project;
        $requestParamHeaders['region'] = $region;
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startOperationsCall('Delete', $optionalArgs, $request, $this->getOperationsClient(), null, Operation::class)->wait();
    }

    /**
     * Creates an address resource in the specified project by using the data included in the request.
     *
     * Sample code:
     * ```
     * $addressesClient = new AddressesClient();
     * try {
     *     $addressResource = new Address();
     *     $project = 'project';
     *     $region = 'region';
     *     $operationResponse = $addressesClient->insert($addressResource, $project, $region);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         // if creating/modifying, retrieve the target resource
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *     // Alternatively:
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $addressesClient->insert($addressResource, $project, $region);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $addressesClient->resumeOperation($operationName, 'insert');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *         // if creating/modifying, retrieve the target resource
     *     } else {
     *         $error = $newOperationResponse->getError();
     *         // handleError($error)
     *     }
     * } finally {
     *     $addressesClient->close();
     * }
     * ```
     *
     * @param Address $addressResource The body resource for this request
     * @param string  $project         Project ID for this request.
     * @param string  $region          Name of the region for this request.
     * @param array   $optionalArgs    {
     *     Optional.
     *
     *     @type string $requestId
     *           An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *           For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *           The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function insert($addressResource, $project, $region, array $optionalArgs = [])
    {
        $request = new InsertAddressRequest();
        $requestParamHeaders = [];
        $request->setAddressResource($addressResource);
        $request->setProject($project);
        $request->setRegion($region);
        $requestParamHeaders['project'] = $project;
        $requestParamHeaders['region'] = $region;
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startOperationsCall('Insert', $optionalArgs, $request, $this->getOperationsClient(), null, Operation::class)->wait();
    }

    /**
     * Retrieves a list of addresses contained within the specified region.
     *
     * Sample code:
     * ```
     * $addressesClient = new AddressesClient();
     * try {
     *     $orderBy = 'order_by';
     *     $project = 'project';
     *     $region = 'region';
     *     // Iterate over pages of elements
     *     $pagedResponse = $addressesClient->list($orderBy, $project, $region);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *     // Alternatively:
     *     // Iterate through all elements
     *     $pagedResponse = $addressesClient->list($orderBy, $project, $region);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $addressesClient->close();
     * }
     * ```
     *
     * @param string $orderBy      Sorts list results by a certain order. By default, results are returned in alphanumerical order based on the resource name.
     *
     *                             You can also sort results in descending order based on the creation timestamp using orderBy="creationTimestamp desc". This sorts results based on the creationTimestamp field in reverse chronological order (newest result first). Use this to sort resources like operations so that the newest operation is returned first.
     *
     *                             Currently, only sorting by name or creationTimestamp desc is supported.
     * @param string $project      Project ID for this request.
     * @param string $region       Name of the region for this request.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type string $filter
     *           A filter expression that filters resources listed in the response. The expression must specify the field name, a comparison operator, and the value that you want to use for filtering. The value must be a string, a number, or a boolean. The comparison operator must be either =, !=, >, or <.
     *
     *           For example, if you are filtering Compute Engine instances, you can exclude instances named example-instance by specifying name != example-instance.
     *
     *           You can also filter nested fields. For example, you could specify scheduling.automaticRestart = false to include instances only if they are not scheduled for automatic restarts. You can use filtering on nested fields to filter based on resource labels.
     *
     *           To filter on multiple expressions, provide each separate expression within parentheses. For example, (scheduling.automaticRestart = true) (cpuPlatform = "Intel Skylake"). By default, each expression is an AND expression. However, you can include AND and OR expressions explicitly. For example, (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND (scheduling.automaticRestart = true).
     *     @type int $maxResults
     *           The maximum number of results per page that should be returned. If the number of available results is larger than maxResults, Compute Engine returns a nextPageToken that can be used to get the next page of results in subsequent list requests. Acceptable values are 0 to 500, inclusive. (Default: 500)
     *     @type string $pageToken
     *           A page token is used to specify a page of values to be returned.
     *           If no page token is specified (the default), the first page
     *           of values will be returned. Any page token used here must have
     *           been generated by a previous call to the API.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function list($orderBy, $project, $region, array $optionalArgs = [])
    {
        $request = new ListAddressesRequest();
        $requestParamHeaders = [];
        $request->setOrderBy($orderBy);
        $request->setProject($project);
        $request->setRegion($region);
        $requestParamHeaders['project'] = $project;
        $requestParamHeaders['region'] = $region;
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }

        if (isset($optionalArgs['maxResults'])) {
            $request->setMaxResults($optionalArgs['maxResults']);
        }

        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->getPagedListResponse('List', $optionalArgs, AddressList::class, $request);
    }
}
