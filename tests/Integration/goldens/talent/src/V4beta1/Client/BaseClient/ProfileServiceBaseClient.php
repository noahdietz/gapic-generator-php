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
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/talent/v4beta1/profile_service.proto
 * Updates to the above are reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\Talent\V4beta1\Client\BaseClient;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Talent\V4beta1\CreateProfileRequest;
use Google\Cloud\Talent\V4beta1\DeleteProfileRequest;
use Google\Cloud\Talent\V4beta1\GetProfileRequest;
use Google\Cloud\Talent\V4beta1\ListProfilesRequest;
use Google\Cloud\Talent\V4beta1\Profile;
use Google\Cloud\Talent\V4beta1\SearchProfilesRequest;
use Google\Cloud\Talent\V4beta1\UpdateProfileRequest;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Service Description: A service that handles profile management, including profile CRUD,
 * enumeration and search.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * This class is currently experimental and may be subject to changes.
 *
 * @experimental
 *
 * @internal
 *
 * @method PromiseInterface createProfileAsync(CreateProfileRequest $request, array $optionalArgs = [])
 * @method PromiseInterface deleteProfileAsync(DeleteProfileRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getProfileAsync(GetProfileRequest $request, array $optionalArgs = [])
 * @method PromiseInterface listProfilesAsync(ListProfilesRequest $request, array $optionalArgs = [])
 * @method PromiseInterface searchProfilesAsync(SearchProfilesRequest $request, array $optionalArgs = [])
 * @method PromiseInterface updateProfileAsync(UpdateProfileRequest $request, array $optionalArgs = [])
 */
class ProfileServiceBaseClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.cloud.talent.v4beta1.ProfileService';

    /** The default address of the service. */
    private const SERVICE_ADDRESS = 'jobs.googleapis.com';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
        'https://www.googleapis.com/auth/jobs',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../../resources/profile_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../../resources/profile_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../../resources/profile_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../../resources/profile_service_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Formats a string containing the fully-qualified path to represent a profile
     * resource.
     *
     * @param string $project
     * @param string $tenant
     * @param string $profile
     *
     * @return string The formatted profile resource.
     *
     * @experimental
     */
    public static function profileName($project, $tenant, $profile)
    {
        return self::getPathTemplate('profile')->render([
            'project' => $project,
            'tenant' => $tenant,
            'profile' => $profile,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a tenant
     * resource.
     *
     * @param string $project
     * @param string $tenant
     *
     * @return string The formatted tenant resource.
     *
     * @experimental
     */
    public static function tenantName($project, $tenant)
    {
        return self::getPathTemplate('tenant')->render([
            'project' => $project,
            'tenant' => $tenant,
        ]);
    }

    private static function registerPathTemplates()
    {
        self::loadPathTemplates(__DIR__ . '/../../resources/profile_service_descriptor_config.php', self::SERVICE_NAME);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - profile: projects/{project}/tenants/{tenant}/profiles/{profile}
     * - tenant: projects/{project}/tenants/{tenant}
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
     *           as "<uri>:<port>". Default 'jobs.googleapis.com:443'.
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
     *
     * @experimental
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
     * Creates and returns a new profile.
     *
     * The async variant is {@see self::createProfileAsync()} .
     *
     * @param CreateProfileRequest $request      A request to house fields associated with the call.
     * @param array                $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Profile
     *
     * @throws ApiException Thrown if the API call fails.
     *
     * @experimental
     */
    public function createProfile(CreateProfileRequest $request, array $optionalArgs = []): Profile
    {
        return $this->startApiCall('CreateProfile', $request, $optionalArgs)->wait();
    }

    /**
     * Deletes the specified profile.
     * Prerequisite: The profile has no associated applications or assignments
     * associated.
     *
     * The async variant is {@see self::deleteProfileAsync()} .
     *
     * @param DeleteProfileRequest $request      A request to house fields associated with the call.
     * @param array                $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException Thrown if the API call fails.
     *
     * @experimental
     */
    public function deleteProfile(DeleteProfileRequest $request, array $optionalArgs = []): void
    {
        $this->startApiCall('DeleteProfile', $request, $optionalArgs)->wait();
    }

    /**
     * Gets the specified profile.
     *
     * The async variant is {@see self::getProfileAsync()} .
     *
     * @param GetProfileRequest $request      A request to house fields associated with the call.
     * @param array             $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Profile
     *
     * @throws ApiException Thrown if the API call fails.
     *
     * @experimental
     */
    public function getProfile(GetProfileRequest $request, array $optionalArgs = []): Profile
    {
        return $this->startApiCall('GetProfile', $request, $optionalArgs)->wait();
    }

    /**
     * Lists profiles by filter. The order is unspecified.
     *
     * The async variant is {@see self::listProfilesAsync()} .
     *
     * @param ListProfilesRequest $request      A request to house fields associated with the call.
     * @param array               $optionalArgs {
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
     *
     * @experimental
     */
    public function listProfiles(ListProfilesRequest $request, array $optionalArgs = []): PagedListResponse
    {
        return $this->startApiCall('ListProfiles', $request, $optionalArgs);
    }

    /**
     * Searches for profiles within a tenant.
     *
     * For example, search by raw queries "software engineer in Mountain View" or
     * search by structured filters (location filter, education filter, etc.).
     *
     * See [SearchProfilesRequest][google.cloud.talent.v4beta1.SearchProfilesRequest] for more information.
     *
     * The async variant is {@see self::searchProfilesAsync()} .
     *
     * @param SearchProfilesRequest $request      A request to house fields associated with the call.
     * @param array                 $optionalArgs {
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
     *
     * @experimental
     */
    public function searchProfiles(SearchProfilesRequest $request, array $optionalArgs = []): PagedListResponse
    {
        return $this->startApiCall('SearchProfiles', $request, $optionalArgs);
    }

    /**
     * Updates the specified profile and returns the updated result.
     *
     * The async variant is {@see self::updateProfileAsync()} .
     *
     * @param UpdateProfileRequest $request      A request to house fields associated with the call.
     * @param array                $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Profile
     *
     * @throws ApiException Thrown if the API call fails.
     *
     * @experimental
     */
    public function updateProfile(UpdateProfileRequest $request, array $optionalArgs = []): Profile
    {
        return $this->startApiCall('UpdateProfile', $request, $optionalArgs)->wait();
    }
}
