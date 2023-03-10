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
 * https://github.com/googleapis/googleapis/blob/master/tests/Unit/ProtoTests/ResourceNames/resource-names.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Testing\ResourceNames\Client\BaseClient;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Testing\ResourceNames\FileLevelChildTypeRefRequest;
use Testing\ResourceNames\FileLevelTypeRefRequest;
use Testing\ResourceNames\MultiPatternRequest;
use Testing\ResourceNames\PlaceholderResponse;
use Testing\ResourceNames\SinglePatternRequest;
use Testing\ResourceNames\WildcardChildReferenceRequest;
use Testing\ResourceNames\WildcardMultiPatternRequest;
use Testing\ResourceNames\WildcardPatternRequest;
use Testing\ResourceNames\WildcardReferenceRequest;

/**
 * Service Description:
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @internal
 *
 * @method PromiseInterface fileLevelChildTypeRefMethodAsync(FileLevelChildTypeRefRequest $request, array $optionalArgs = [])
 * @method PromiseInterface fileLevelTypeRefMethodAsync(FileLevelTypeRefRequest $request, array $optionalArgs = [])
 * @method PromiseInterface multiPatternMethodAsync(MultiPatternRequest $request, array $optionalArgs = [])
 * @method PromiseInterface singlePatternMethodAsync(SinglePatternRequest $request, array $optionalArgs = [])
 * @method PromiseInterface wildcardChildReferenceMethodAsync(WildcardChildReferenceRequest $request, array $optionalArgs = [])
 * @method PromiseInterface wildcardMethodAsync(WildcardPatternRequest $request, array $optionalArgs = [])
 * @method PromiseInterface wildcardMultiMethodAsync(WildcardMultiPatternRequest $request, array $optionalArgs = [])
 * @method PromiseInterface wildcardReferenceMethodAsync(WildcardReferenceRequest $request, array $optionalArgs = [])
 */
class ResourceNamesBaseClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'testing.resourcenames.ResourceNames';

    /** The default address of the service. */
    const SERVICE_ADDRESS = 'resourcenames.example.com';

    /** The default port of the service. */
    const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../../resources/resource_names_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../../resources/resource_names_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../../resources/resource_names_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../../resources/resource_names_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * deeply_nested resource.
     *
     * @param string $foo
     *
     * @return string The formatted deeply_nested resource.
     */
    public static function deeplyNestedName($foo)
    {
        return self::getPathTemplate('deeplyNested')->render([
            'foo' => $foo,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a file_res_def
     * resource.
     *
     * @param string $item1Id
     *
     * @return string The formatted file_res_def resource.
     */
    public static function fileResDefName($item1Id)
    {
        return self::getPathTemplate('fileResDef')->render([
            'item1_id' => $item1Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a folder
     * resource.
     *
     * @param string $folderId
     *
     * @return string The formatted folder resource.
     */
    public static function folderName($folderId)
    {
        return self::getPathTemplate('folder')->render([
            'folder_id' => $folderId,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a folder1
     * resource.
     *
     * @param string $folder1Id
     *
     * @return string The formatted folder1 resource.
     */
    public static function folder1Name($folder1Id)
    {
        return self::getPathTemplate('folder1')->render([
            'folder1_id' => $folder1Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a folder2
     * resource.
     *
     * @param string $folder2Id
     *
     * @return string The formatted folder2 resource.
     */
    public static function folder2Name($folder2Id)
    {
        return self::getPathTemplate('folder2')->render([
            'folder2_id' => $folder2Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a item1_id
     * resource.
     *
     * @param string $item1Id
     *
     * @return string The formatted item1_id resource.
     */
    public static function item1IdName($item1Id)
    {
        return self::getPathTemplate('item1Id')->render([
            'item1_id' => $item1Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * item1_id_item2_id resource.
     *
     * @param string $item1Id
     * @param string $item2Id
     *
     * @return string The formatted item1_id_item2_id resource.
     */
    public static function item1IdItem2IdName($item1Id, $item2Id)
    {
        return self::getPathTemplate('item1IdItem2Id')->render([
            'item1_id' => $item1Id,
            'item2_id' => $item2Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a item2_id
     * resource.
     *
     * @param string $item2Id
     *
     * @return string The formatted item2_id resource.
     */
    public static function item2IdName($item2Id)
    {
        return self::getPathTemplate('item2Id')->render([
            'item2_id' => $item2Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a item3_id
     * resource.
     *
     * @param string $item3Id
     *
     * @return string The formatted item3_id resource.
     */
    public static function item3IdName($item3Id)
    {
        return self::getPathTemplate('item3Id')->render([
            'item3_id' => $item3Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * item4_id_item5a_id_item5b_id_item5c_id_item5d_id_item5e_id_item6_id resource.
     *
     * @param string $item4Id
     * @param string $item5aId
     * @param string $item5bId
     * @param string $item5cId
     * @param string $item5dId
     * @param string $item5eId
     * @param string $item6Id
     *
     * @return string The formatted item4_id_item5a_id_item5b_id_item5c_id_item5d_id_item5e_id_item6_id resource.
     */
    public static function item4IdItem5aIdItem5bIdItem5cIdItem5dIdItem5eIdItem6IdName($item4Id, $item5aId, $item5bId, $item5cId, $item5dId, $item5eId, $item6Id)
    {
        return self::getPathTemplate('item4IdItem5aIdItem5bIdItem5cIdItem5dIdItem5eIdItem6Id')->render([
            'item4_id' => $item4Id,
            'item5a_id' => $item5aId,
            'item5b_id' => $item5bId,
            'item5c_id' => $item5cId,
            'item5d_id' => $item5dId,
            'item5e_id' => $item5eId,
            'item6_id' => $item6Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * multi_pattern resource.
     *
     * @param string $item1Id
     * @param string $item2Id
     *
     * @return string The formatted multi_pattern resource.
     */
    public static function multiPatternName($item1Id, $item2Id)
    {
        return self::getPathTemplate('multiPattern')->render([
            'item1_id' => $item1Id,
            'item2_id' => $item2Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a order1
     * resource.
     *
     * @param string $order1Id
     *
     * @return string The formatted order1 resource.
     */
    public static function order1Name($order1Id)
    {
        return self::getPathTemplate('order1')->render([
            'order1_id' => $order1Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a order2
     * resource.
     *
     * @param string $order2Id
     *
     * @return string The formatted order2 resource.
     */
    public static function order2Name($order2Id)
    {
        return self::getPathTemplate('order2')->render([
            'order2_id' => $order2Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a order3
     * resource.
     *
     * @param string $order3Id
     *
     * @return string The formatted order3 resource.
     */
    public static function order3Name($order3Id)
    {
        return self::getPathTemplate('order3')->render([
            'order3_id' => $order3Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * single_pattern resource.
     *
     * @param string $item1Id
     * @param string $item2Id
     *
     * @return string The formatted single_pattern resource.
     */
    public static function singlePatternName($item1Id, $item2Id)
    {
        return self::getPathTemplate('singlePattern')->render([
            'item1_id' => $item1Id,
            'item2_id' => $item2Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * wildcard_multi_pattern resource.
     *
     * @param string $item1Id
     *
     * @return string The formatted wildcard_multi_pattern resource.
     */
    public static function wildcardMultiPatternName($item1Id)
    {
        return self::getPathTemplate('wildcardMultiPattern')->render([
            'item1_id' => $item1Id,
        ]);
    }

    private static function registerPathTemplates()
    {
        self::loadPathTemplates(__DIR__ . '/../../resources/resource_names_descriptor_config.php', self::SERVICE_NAME);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - deeplyNested: foos/{foo}
     * - fileResDef: items1/{item1_id}
     * - folder: folders/{folder_id}
     * - folder1: folders1/{folder1_id}
     * - folder2: folders2/{folder2_id}
     * - item1Id: items1/{item1_id}
     * - item1IdItem2Id: items1/{item1_id}/items2/{item2_id}
     * - item2Id: items2/{item2_id}
     * - item3Id: items3/{item3_id}
     * - item4IdItem5aIdItem5bIdItem5cIdItem5dIdItem5eIdItem6Id: items4/{item4_id}/items5/{item5a_id}_{item5b_id}-{item5c_id}.{item5d_id}~{item5e_id}/items6/{item6_id}
     * - multiPattern: items1/{item1_id}/items2/{item2_id}
     * - order1: orders1/{order1_id}
     * - order2: orders2/{order2_id}
     * - order3: orders3/{order3_id}
     * - singlePattern: items1/{item1_id}/items2/{item2_id}
     * - wildcardMultiPattern: items1/{item1_id}
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
     *           as "<uri>:<port>". Default 'resourcenames.example.com:443'.
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
    }

    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * The async variant is {@see self::fileLevelChildTypeRefMethodAsync()} .
     *
     * @param FileLevelChildTypeRefRequest $request      A request to house fields associated with the call.
     * @param array                        $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PlaceholderResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function fileLevelChildTypeRefMethod(FileLevelChildTypeRefRequest $request, array $optionalArgs = []): PlaceholderResponse
    {
        return $this->startApiCall('FileLevelChildTypeRefMethod', $request, $optionalArgs)->wait();
    }

    /**
     * The async variant is {@see self::fileLevelTypeRefMethodAsync()} .
     *
     * @param FileLevelTypeRefRequest $request      A request to house fields associated with the call.
     * @param array                   $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PlaceholderResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function fileLevelTypeRefMethod(FileLevelTypeRefRequest $request, array $optionalArgs = []): PlaceholderResponse
    {
        return $this->startApiCall('FileLevelTypeRefMethod', $request, $optionalArgs)->wait();
    }

    /**
     * The async variant is {@see self::multiPatternMethodAsync()} .
     *
     * @param MultiPatternRequest $request      A request to house fields associated with the call.
     * @param array               $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PlaceholderResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function multiPatternMethod(MultiPatternRequest $request, array $optionalArgs = []): PlaceholderResponse
    {
        return $this->startApiCall('MultiPatternMethod', $request, $optionalArgs)->wait();
    }

    /**
     * The async variant is {@see self::singlePatternMethodAsync()} .
     *
     * @param SinglePatternRequest $request      A request to house fields associated with the call.
     * @param array                $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PlaceholderResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function singlePatternMethod(SinglePatternRequest $request, array $optionalArgs = []): PlaceholderResponse
    {
        return $this->startApiCall('SinglePatternMethod', $request, $optionalArgs)->wait();
    }

    /**
     * The async variant is {@see self::wildcardChildReferenceMethodAsync()} .
     *
     * @param WildcardChildReferenceRequest $request      A request to house fields associated with the call.
     * @param array                         $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PlaceholderResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function wildcardChildReferenceMethod(WildcardChildReferenceRequest $request, array $optionalArgs = []): PlaceholderResponse
    {
        return $this->startApiCall('WildcardChildReferenceMethod', $request, $optionalArgs)->wait();
    }

    /**
     * The async variant is {@see self::wildcardMethodAsync()} .
     *
     * @param WildcardPatternRequest $request      A request to house fields associated with the call.
     * @param array                  $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PlaceholderResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function wildcardMethod(WildcardPatternRequest $request, array $optionalArgs = []): PlaceholderResponse
    {
        return $this->startApiCall('WildcardMethod', $request, $optionalArgs)->wait();
    }

    /**
     * The async variant is {@see self::wildcardMultiMethodAsync()} .
     *
     * @param WildcardMultiPatternRequest $request      A request to house fields associated with the call.
     * @param array                       $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PlaceholderResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function wildcardMultiMethod(WildcardMultiPatternRequest $request, array $optionalArgs = []): PlaceholderResponse
    {
        return $this->startApiCall('WildcardMultiMethod', $request, $optionalArgs)->wait();
    }

    /**
     * The async variant is {@see self::wildcardReferenceMethodAsync()} .
     *
     * @param WildcardReferenceRequest $request      A request to house fields associated with the call.
     * @param array                    $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PlaceholderResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function wildcardReferenceMethod(WildcardReferenceRequest $request, array $optionalArgs = []): PlaceholderResponse
    {
        return $this->startApiCall('WildcardReferenceMethod', $request, $optionalArgs)->wait();
    }
}
