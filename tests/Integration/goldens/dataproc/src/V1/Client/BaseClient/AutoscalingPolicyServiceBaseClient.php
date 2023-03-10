<?php
/*
 * Copyright 2023 Google LLC
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
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/dataproc/v1/autoscaling_policies.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\Dataproc\V1\Client\BaseClient;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Dataproc\V1\AutoscalingPolicy;
use Google\Cloud\Dataproc\V1\CreateAutoscalingPolicyRequest;
use Google\Cloud\Dataproc\V1\DeleteAutoscalingPolicyRequest;
use Google\Cloud\Dataproc\V1\GetAutoscalingPolicyRequest;
use Google\Cloud\Dataproc\V1\ListAutoscalingPoliciesRequest;
use Google\Cloud\Dataproc\V1\UpdateAutoscalingPolicyRequest;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Service Description: The API interface for managing autoscaling policies in the
 * Dataproc API.
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
 * @method PromiseInterface createAutoscalingPolicyAsync(CreateAutoscalingPolicyRequest $request, array $optionalArgs = [])
 * @method PromiseInterface deleteAutoscalingPolicyAsync(DeleteAutoscalingPolicyRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getAutoscalingPolicyAsync(GetAutoscalingPolicyRequest $request, array $optionalArgs = [])
 * @method PromiseInterface listAutoscalingPoliciesAsync(ListAutoscalingPoliciesRequest $request, array $optionalArgs = [])
 * @method PromiseInterface updateAutoscalingPolicyAsync(UpdateAutoscalingPolicyRequest $request, array $optionalArgs = [])
 */
class AutoscalingPolicyServiceBaseClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'google.cloud.dataproc.v1.AutoscalingPolicyService';

    /** The default address of the service. */
    const SERVICE_ADDRESS = 'dataproc.googleapis.com';

    /** The default port of the service. */
    const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../../resources/autoscaling_policy_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../../resources/autoscaling_policy_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../../resources/autoscaling_policy_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../../resources/autoscaling_policy_service_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * autoscaling_policy resource.
     *
     * @param string $project
     * @param string $location
     * @param string $autoscalingPolicy
     *
     * @return string The formatted autoscaling_policy resource.
     */
    public static function autoscalingPolicyName($project, $location, $autoscalingPolicy)
    {
        return self::getPathTemplate('autoscalingPolicy')->render([
            'project' => $project,
            'location' => $location,
            'autoscaling_policy' => $autoscalingPolicy,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a location
     * resource.
     *
     * @param string $project
     * @param string $location
     *
     * @return string The formatted location resource.
     */
    public static function locationName($project, $location)
    {
        return self::getPathTemplate('location')->render([
            'project' => $project,
            'location' => $location,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * project_location_autoscaling_policy resource.
     *
     * @param string $project
     * @param string $location
     * @param string $autoscalingPolicy
     *
     * @return string The formatted project_location_autoscaling_policy resource.
     */
    public static function projectLocationAutoscalingPolicyName($project, $location, $autoscalingPolicy)
    {
        return self::getPathTemplate('projectLocationAutoscalingPolicy')->render([
            'project' => $project,
            'location' => $location,
            'autoscaling_policy' => $autoscalingPolicy,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * project_region_autoscaling_policy resource.
     *
     * @param string $project
     * @param string $region
     * @param string $autoscalingPolicy
     *
     * @return string The formatted project_region_autoscaling_policy resource.
     */
    public static function projectRegionAutoscalingPolicyName($project, $region, $autoscalingPolicy)
    {
        return self::getPathTemplate('projectRegionAutoscalingPolicy')->render([
            'project' => $project,
            'region' => $region,
            'autoscaling_policy' => $autoscalingPolicy,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a region
     * resource.
     *
     * @param string $project
     * @param string $region
     *
     * @return string The formatted region resource.
     */
    public static function regionName($project, $region)
    {
        return self::getPathTemplate('region')->render([
            'project' => $project,
            'region' => $region,
        ]);
    }

    private static function registerPathTemplates()
    {
        self::loadPathTemplates(__DIR__ . '/../../resources/autoscaling_policy_service_descriptor_config.php', self::SERVICE_NAME);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - autoscalingPolicy: projects/{project}/locations/{location}/autoscalingPolicies/{autoscaling_policy}
     * - location: projects/{project}/locations/{location}
     * - projectLocationAutoscalingPolicy: projects/{project}/locations/{location}/autoscalingPolicies/{autoscaling_policy}
     * - projectRegionAutoscalingPolicy: projects/{project}/regions/{region}/autoscalingPolicies/{autoscaling_policy}
     * - region: projects/{project}/regions/{region}
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
     *           as "<uri>:<port>". Default 'dataproc.googleapis.com:443'.
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
     * Creates new autoscaling policy.
     *
     * The async variant is {@see self::createAutoscalingPolicyAsync()} .
     *
     * @param CreateAutoscalingPolicyRequest $request      A request to house fields associated with the call.
     * @param array                          $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return AutoscalingPolicy
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createAutoscalingPolicy(CreateAutoscalingPolicyRequest $request, array $optionalArgs = []): AutoscalingPolicy
    {
        return $this->startApiCall('CreateAutoscalingPolicy', $request, $optionalArgs)->wait();
    }

    /**
     * Deletes an autoscaling policy. It is an error to delete an autoscaling
     * policy that is in use by one or more clusters.
     *
     * The async variant is {@see self::deleteAutoscalingPolicyAsync()} .
     *
     * @param DeleteAutoscalingPolicyRequest $request      A request to house fields associated with the call.
     * @param array                          $optionalArgs {
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
    public function deleteAutoscalingPolicy(DeleteAutoscalingPolicyRequest $request, array $optionalArgs = []): void
    {
        $this->startApiCall('DeleteAutoscalingPolicy', $request, $optionalArgs)->wait();
    }

    /**
     * Retrieves autoscaling policy.
     *
     * The async variant is {@see self::getAutoscalingPolicyAsync()} .
     *
     * @param GetAutoscalingPolicyRequest $request      A request to house fields associated with the call.
     * @param array                       $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return AutoscalingPolicy
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getAutoscalingPolicy(GetAutoscalingPolicyRequest $request, array $optionalArgs = []): AutoscalingPolicy
    {
        return $this->startApiCall('GetAutoscalingPolicy', $request, $optionalArgs)->wait();
    }

    /**
     * Lists autoscaling policies in the project.
     *
     * The async variant is {@see self::listAutoscalingPoliciesAsync()} .
     *
     * @param ListAutoscalingPoliciesRequest $request      A request to house fields associated with the call.
     * @param array                          $optionalArgs {
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
    public function listAutoscalingPolicies(ListAutoscalingPoliciesRequest $request, array $optionalArgs = []): PagedListResponse
    {
        return $this->startApiCall('ListAutoscalingPolicies', $request, $optionalArgs);
    }

    /**
     * Updates (replaces) autoscaling policy.
     *
     * Disabled check for update_mask, because all updates will be full
     * replacements.
     *
     * The async variant is {@see self::updateAutoscalingPolicyAsync()} .
     *
     * @param UpdateAutoscalingPolicyRequest $request      A request to house fields associated with the call.
     * @param array                          $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return AutoscalingPolicy
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function updateAutoscalingPolicy(UpdateAutoscalingPolicyRequest $request, array $optionalArgs = []): AutoscalingPolicy
    {
        return $this->startApiCall('UpdateAutoscalingPolicy', $request, $optionalArgs)->wait();
    }
}
