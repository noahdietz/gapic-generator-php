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
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/dataproc/v1/autoscaling_policies.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\Dataproc\V1\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\Call;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Dataproc\V1\AutoscalingPolicy;
use Google\Cloud\Dataproc\V1\CreateAutoscalingPolicyRequest;
use Google\Cloud\Dataproc\V1\DeleteAutoscalingPolicyRequest;
use Google\Cloud\Dataproc\V1\GetAutoscalingPolicyRequest;
use Google\Cloud\Dataproc\V1\ListAutoscalingPoliciesRequest;
use Google\Cloud\Dataproc\V1\ListAutoscalingPoliciesResponse;
use Google\Cloud\Dataproc\V1\UpdateAutoscalingPolicyRequest;
use Google\Cloud\Iam\V1\GetIamPolicyRequest;
use Google\Cloud\Iam\V1\GetPolicyOptions;
use Google\Cloud\Iam\V1\Policy;
use Google\Cloud\Iam\V1\SetIamPolicyRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsResponse;
use Google\Protobuf\FieldMask;
use Google\Protobuf\GPBEmpty;

/**
 * Service Description: The API interface for managing autoscaling policies in the
 * Dataproc API.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $autoscalingPolicyServiceClient = new AutoscalingPolicyServiceClient();
 * try {
 *     $formattedParent = $autoscalingPolicyServiceClient->regionName('[PROJECT]', '[REGION]');
 *     $policy = new AutoscalingPolicy();
 *     $response = $autoscalingPolicyServiceClient->createAutoscalingPolicy($formattedParent, $policy);
 * } finally {
 *     $autoscalingPolicyServiceClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @deprecated This class will be removed in the next major version update.
 */
class AutoscalingPolicyServiceGapicClient
{
    use GapicClientTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'google.cloud.dataproc.v1.AutoscalingPolicyService';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    const SERVICE_ADDRESS = 'dataproc.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'dataproc.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];

    private static $autoscalingPolicyNameTemplate;

    private static $locationNameTemplate;

    private static $projectLocationAutoscalingPolicyNameTemplate;

    private static $projectRegionAutoscalingPolicyNameTemplate;

    private static $regionNameTemplate;

    private static $pathTemplateMap;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/autoscaling_policy_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/autoscaling_policy_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/autoscaling_policy_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/autoscaling_policy_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getAutoscalingPolicyNameTemplate()
    {
        if (self::$autoscalingPolicyNameTemplate == null) {
            self::$autoscalingPolicyNameTemplate = new PathTemplate('projects/{project}/locations/{location}/autoscalingPolicies/{autoscaling_policy}');
        }

        return self::$autoscalingPolicyNameTemplate;
    }

    private static function getLocationNameTemplate()
    {
        if (self::$locationNameTemplate == null) {
            self::$locationNameTemplate = new PathTemplate('projects/{project}/locations/{location}');
        }

        return self::$locationNameTemplate;
    }

    private static function getProjectLocationAutoscalingPolicyNameTemplate()
    {
        if (self::$projectLocationAutoscalingPolicyNameTemplate == null) {
            self::$projectLocationAutoscalingPolicyNameTemplate = new PathTemplate('projects/{project}/locations/{location}/autoscalingPolicies/{autoscaling_policy}');
        }

        return self::$projectLocationAutoscalingPolicyNameTemplate;
    }

    private static function getProjectRegionAutoscalingPolicyNameTemplate()
    {
        if (self::$projectRegionAutoscalingPolicyNameTemplate == null) {
            self::$projectRegionAutoscalingPolicyNameTemplate = new PathTemplate('projects/{project}/regions/{region}/autoscalingPolicies/{autoscaling_policy}');
        }

        return self::$projectRegionAutoscalingPolicyNameTemplate;
    }

    private static function getRegionNameTemplate()
    {
        if (self::$regionNameTemplate == null) {
            self::$regionNameTemplate = new PathTemplate('projects/{project}/regions/{region}');
        }

        return self::$regionNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (self::$pathTemplateMap == null) {
            self::$pathTemplateMap = [
                'autoscalingPolicy' => self::getAutoscalingPolicyNameTemplate(),
                'location' => self::getLocationNameTemplate(),
                'projectLocationAutoscalingPolicy' => self::getProjectLocationAutoscalingPolicyNameTemplate(),
                'projectRegionAutoscalingPolicy' => self::getProjectRegionAutoscalingPolicyNameTemplate(),
                'region' => self::getRegionNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
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
        return self::getAutoscalingPolicyNameTemplate()->render([
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
        return self::getLocationNameTemplate()->render([
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
        return self::getProjectLocationAutoscalingPolicyNameTemplate()->render([
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
        return self::getProjectRegionAutoscalingPolicyNameTemplate()->render([
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
        return self::getRegionNameTemplate()->render([
            'project' => $project,
            'region' => $region,
        ]);
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

    /**
     * Creates new autoscaling policy.
     *
     * Sample code:
     * ```
     * $autoscalingPolicyServiceClient = new AutoscalingPolicyServiceClient();
     * try {
     *     $formattedParent = $autoscalingPolicyServiceClient->regionName('[PROJECT]', '[REGION]');
     *     $policy = new AutoscalingPolicy();
     *     $response = $autoscalingPolicyServiceClient->createAutoscalingPolicy($formattedParent, $policy);
     * } finally {
     *     $autoscalingPolicyServiceClient->close();
     * }
     * ```
     *
     * @param string            $parent       Required. The "resource name" of the region or location, as described
     *                                        in https://cloud.google.com/apis/design/resource_names.
     *
     *                                        * For `projects.regions.autoscalingPolicies.create`, the resource name
     *                                        of the region has the following format:
     *                                        `projects/{project_id}/regions/{region}`
     *
     *                                        * For `projects.locations.autoscalingPolicies.create`, the resource name
     *                                        of the location has the following format:
     *                                        `projects/{project_id}/locations/{location}`
     * @param AutoscalingPolicy $policy       Required. The autoscaling policy to create.
     * @param array             $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataproc\V1\AutoscalingPolicy
     *
     * @throws ApiException if the remote call fails
     */
    public function createAutoscalingPolicy($parent, $policy, array $optionalArgs = [])
    {
        $request = new CreateAutoscalingPolicyRequest();
        $requestParamHeaders = [];
        $request->setParent($parent);
        $request->setPolicy($policy);
        $requestParamHeaders['parent'] = $parent;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('CreateAutoscalingPolicy', AutoscalingPolicy::class, $optionalArgs, $request)->wait();
    }

    /**
     * Deletes an autoscaling policy. It is an error to delete an autoscaling
     * policy that is in use by one or more clusters.
     *
     * Sample code:
     * ```
     * $autoscalingPolicyServiceClient = new AutoscalingPolicyServiceClient();
     * try {
     *     $formattedName = $autoscalingPolicyServiceClient->autoscalingPolicyName('[PROJECT]', '[LOCATION]', '[AUTOSCALING_POLICY]');
     *     $autoscalingPolicyServiceClient->deleteAutoscalingPolicy($formattedName);
     * } finally {
     *     $autoscalingPolicyServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The "resource name" of the autoscaling policy, as described
     *                             in https://cloud.google.com/apis/design/resource_names.
     *
     *                             * For `projects.regions.autoscalingPolicies.delete`, the resource name
     *                             of the policy has the following format:
     *                             `projects/{project_id}/regions/{region}/autoscalingPolicies/{policy_id}`
     *
     *                             * For `projects.locations.autoscalingPolicies.delete`, the resource name
     *                             of the policy has the following format:
     *                             `projects/{project_id}/locations/{location}/autoscalingPolicies/{policy_id}`
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     */
    public function deleteAutoscalingPolicy($name, array $optionalArgs = [])
    {
        $request = new DeleteAutoscalingPolicyRequest();
        $requestParamHeaders = [];
        $request->setName($name);
        $requestParamHeaders['name'] = $name;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('DeleteAutoscalingPolicy', GPBEmpty::class, $optionalArgs, $request)->wait();
    }

    /**
     * Retrieves autoscaling policy.
     *
     * Sample code:
     * ```
     * $autoscalingPolicyServiceClient = new AutoscalingPolicyServiceClient();
     * try {
     *     $formattedName = $autoscalingPolicyServiceClient->autoscalingPolicyName('[PROJECT]', '[LOCATION]', '[AUTOSCALING_POLICY]');
     *     $response = $autoscalingPolicyServiceClient->getAutoscalingPolicy($formattedName);
     * } finally {
     *     $autoscalingPolicyServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The "resource name" of the autoscaling policy, as described
     *                             in https://cloud.google.com/apis/design/resource_names.
     *
     *                             * For `projects.regions.autoscalingPolicies.get`, the resource name
     *                             of the policy has the following format:
     *                             `projects/{project_id}/regions/{region}/autoscalingPolicies/{policy_id}`
     *
     *                             * For `projects.locations.autoscalingPolicies.get`, the resource name
     *                             of the policy has the following format:
     *                             `projects/{project_id}/locations/{location}/autoscalingPolicies/{policy_id}`
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataproc\V1\AutoscalingPolicy
     *
     * @throws ApiException if the remote call fails
     */
    public function getAutoscalingPolicy($name, array $optionalArgs = [])
    {
        $request = new GetAutoscalingPolicyRequest();
        $requestParamHeaders = [];
        $request->setName($name);
        $requestParamHeaders['name'] = $name;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('GetAutoscalingPolicy', AutoscalingPolicy::class, $optionalArgs, $request)->wait();
    }

    /**
     * Lists autoscaling policies in the project.
     *
     * Sample code:
     * ```
     * $autoscalingPolicyServiceClient = new AutoscalingPolicyServiceClient();
     * try {
     *     $formattedParent = $autoscalingPolicyServiceClient->regionName('[PROJECT]', '[REGION]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $autoscalingPolicyServiceClient->listAutoscalingPolicies($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *     // Alternatively:
     *     // Iterate through all elements
     *     $pagedResponse = $autoscalingPolicyServiceClient->listAutoscalingPolicies($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $autoscalingPolicyServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The "resource name" of the region or location, as described
     *                             in https://cloud.google.com/apis/design/resource_names.
     *
     *                             * For `projects.regions.autoscalingPolicies.list`, the resource name
     *                             of the region has the following format:
     *                             `projects/{project_id}/regions/{region}`
     *
     *                             * For `projects.locations.autoscalingPolicies.list`, the resource name
     *                             of the location has the following format:
     *                             `projects/{project_id}/locations/{location}`
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type int $pageSize
     *           The maximum number of resources contained in the underlying API
     *           response. The API may return fewer values in a page, even if
     *           there are additional values to be retrieved.
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
    public function listAutoscalingPolicies($parent, array $optionalArgs = [])
    {
        $request = new ListAutoscalingPoliciesRequest();
        $requestParamHeaders = [];
        $request->setParent($parent);
        $requestParamHeaders['parent'] = $parent;
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }

        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->getPagedListResponse('ListAutoscalingPolicies', $optionalArgs, ListAutoscalingPoliciesResponse::class, $request);
    }

    /**
     * Updates (replaces) autoscaling policy.
     *
     * Disabled check for update_mask, because all updates will be full
     * replacements.
     *
     * Sample code:
     * ```
     * $autoscalingPolicyServiceClient = new AutoscalingPolicyServiceClient();
     * try {
     *     $policy = new AutoscalingPolicy();
     *     $response = $autoscalingPolicyServiceClient->updateAutoscalingPolicy($policy);
     * } finally {
     *     $autoscalingPolicyServiceClient->close();
     * }
     * ```
     *
     * @param AutoscalingPolicy $policy       Required. The updated autoscaling policy.
     * @param array             $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataproc\V1\AutoscalingPolicy
     *
     * @throws ApiException if the remote call fails
     */
    public function updateAutoscalingPolicy($policy, array $optionalArgs = [])
    {
        $request = new UpdateAutoscalingPolicyRequest();
        $requestParamHeaders = [];
        $request->setPolicy($policy);
        $requestParamHeaders['policy.name'] = $policy->getName();
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('UpdateAutoscalingPolicy', AutoscalingPolicy::class, $optionalArgs, $request)->wait();
    }

    /**
     * Gets the access control policy for a resource. Returns an empty policy
    if the resource exists and does not have a policy set.
     *
     * Sample code:
     * ```
     * $autoscalingPolicyServiceClient = new AutoscalingPolicyServiceClient();
     * try {
     *     $resource = 'resource';
     *     $response = $autoscalingPolicyServiceClient->getIamPolicy($resource);
     * } finally {
     *     $autoscalingPolicyServiceClient->close();
     * }
     * ```
     *
     * @param string $resource     REQUIRED: The resource for which the policy is being requested.
     *                             See the operation documentation for the appropriate value for this field.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type GetPolicyOptions $options
     *           OPTIONAL: A `GetPolicyOptions` object for specifying options to
     *           `GetIamPolicy`.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\Policy
     *
     * @throws ApiException if the remote call fails
     */
    public function getIamPolicy($resource, array $optionalArgs = [])
    {
        $request = new GetIamPolicyRequest();
        $requestParamHeaders = [];
        $request->setResource($resource);
        $requestParamHeaders['resource'] = $resource;
        if (isset($optionalArgs['options'])) {
            $request->setOptions($optionalArgs['options']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('GetIamPolicy', Policy::class, $optionalArgs, $request, Call::UNARY_CALL, 'google.iam.v1.IAMPolicy')->wait();
    }

    /**
     * Sets the access control policy on the specified resource. Replaces
    any existing policy.

    Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and `PERMISSION_DENIED`
    errors.
     *
     * Sample code:
     * ```
     * $autoscalingPolicyServiceClient = new AutoscalingPolicyServiceClient();
     * try {
     *     $resource = 'resource';
     *     $policy = new Policy();
     *     $response = $autoscalingPolicyServiceClient->setIamPolicy($resource, $policy);
     * } finally {
     *     $autoscalingPolicyServiceClient->close();
     * }
     * ```
     *
     * @param string $resource     REQUIRED: The resource for which the policy is being specified.
     *                             See the operation documentation for the appropriate value for this field.
     * @param Policy $policy       REQUIRED: The complete policy to be applied to the `resource`. The size of
     *                             the policy is limited to a few 10s of KB. An empty policy is a
     *                             valid policy but certain Cloud Platform services (such as Projects)
     *                             might reject them.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type FieldMask $updateMask
     *           OPTIONAL: A FieldMask specifying which fields of the policy to modify. Only
     *           the fields in the mask will be modified. If no mask is provided, the
     *           following default mask is used:
     *
     *           `paths: "bindings, etag"`
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\Policy
     *
     * @throws ApiException if the remote call fails
     */
    public function setIamPolicy($resource, $policy, array $optionalArgs = [])
    {
        $request = new SetIamPolicyRequest();
        $requestParamHeaders = [];
        $request->setResource($resource);
        $request->setPolicy($policy);
        $requestParamHeaders['resource'] = $resource;
        if (isset($optionalArgs['updateMask'])) {
            $request->setUpdateMask($optionalArgs['updateMask']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('SetIamPolicy', Policy::class, $optionalArgs, $request, Call::UNARY_CALL, 'google.iam.v1.IAMPolicy')->wait();
    }

    /**
     * Returns permissions that a caller has on the specified resource. If the
    resource does not exist, this will return an empty set of
    permissions, not a `NOT_FOUND` error.

    Note: This operation is designed to be used for building
    permission-aware UIs and command-line tools, not for authorization
    checking. This operation may "fail open" without warning.
     *
     * Sample code:
     * ```
     * $autoscalingPolicyServiceClient = new AutoscalingPolicyServiceClient();
     * try {
     *     $resource = 'resource';
     *     $permissions = [];
     *     $response = $autoscalingPolicyServiceClient->testIamPermissions($resource, $permissions);
     * } finally {
     *     $autoscalingPolicyServiceClient->close();
     * }
     * ```
     *
     * @param string   $resource     REQUIRED: The resource for which the policy detail is being requested.
     *                               See the operation documentation for the appropriate value for this field.
     * @param string[] $permissions  The set of permissions to check for the `resource`. Permissions with
     *                               wildcards (such as '*' or 'storage.*') are not allowed. For more
     *                               information see
     *                               [IAM Overview](https://cloud.google.com/iam/docs/overview#permissions).
     * @param array    $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\TestIamPermissionsResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function testIamPermissions($resource, $permissions, array $optionalArgs = [])
    {
        $request = new TestIamPermissionsRequest();
        $requestParamHeaders = [];
        $request->setResource($resource);
        $request->setPermissions($permissions);
        $requestParamHeaders['resource'] = $resource;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('TestIamPermissions', TestIamPermissionsResponse::class, $optionalArgs, $request, Call::UNARY_CALL, 'google.iam.v1.IAMPolicy')->wait();
    }
}
