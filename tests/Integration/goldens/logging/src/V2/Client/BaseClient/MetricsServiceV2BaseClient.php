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
 * https://github.com/googleapis/googleapis/blob/master/google/logging/v2/logging_metrics.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\Logging\V2\Client\BaseClient;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Logging\V2\CreateLogMetricRequest;
use Google\Cloud\Logging\V2\DeleteLogMetricRequest;
use Google\Cloud\Logging\V2\GetLogMetricRequest;
use Google\Cloud\Logging\V2\ListLogMetricsRequest;
use Google\Cloud\Logging\V2\LogMetric;
use Google\Cloud\Logging\V2\UpdateLogMetricRequest;

/**
 * Service Description: Service for configuring logs-based metrics.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @method GuzzleHttp\Promise\PromiseInterface createLogMetricAsync(\Google\Cloud\Logging\V2\CreateLogMetricRequest $request, array $optionalArgs = [])
 *
 * @method GuzzleHttp\Promise\PromiseInterface deleteLogMetricAsync(\Google\Cloud\Logging\V2\DeleteLogMetricRequest $request, array $optionalArgs = [])
 *
 * @method GuzzleHttp\Promise\PromiseInterface getLogMetricAsync(\Google\Cloud\Logging\V2\GetLogMetricRequest $request, array $optionalArgs = [])
 *
 * @method GuzzleHttp\Promise\PromiseInterface listLogMetricsAsync(\Google\Cloud\Logging\V2\ListLogMetricsRequest $request, array $optionalArgs = [])
 *
 * @method GuzzleHttp\Promise\PromiseInterface updateLogMetricAsync(\Google\Cloud\Logging\V2\UpdateLogMetricRequest $request, array $optionalArgs = [])
 */
class MetricsServiceV2BaseClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'google.logging.v2.MetricsServiceV2';

    /** The default address of the service. */
    const SERVICE_ADDRESS = 'logging.googleapis.com';

    /** The default port of the service. */
    const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
        'https://www.googleapis.com/auth/cloud-platform.read-only',
        'https://www.googleapis.com/auth/logging.admin',
        'https://www.googleapis.com/auth/logging.read',
        'https://www.googleapis.com/auth/logging.write',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../../resources/metrics_service_v2_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../../resources/metrics_service_v2_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../../resources/metrics_service_v2_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../../resources/metrics_service_v2_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Formats a string containing the fully-qualified path to represent a log_metric
     * resource.
     *
     * @param string $project
     * @param string $metric
     *
     * @return string The formatted log_metric resource.
     */
    public static function logMetricName($project, $metric)
    {
        return self::getPathTemplate('logMetric')->render([
            'project' => $project,
            'metric' => $metric,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a project
     * resource.
     *
     * @param string $project
     *
     * @return string The formatted project resource.
     */
    public static function projectName($project)
    {
        return self::getPathTemplate('project')->render([
            'project' => $project,
        ]);
    }

    private static function registerPathTemplates()
    {
        self::loadPathTemplates(__DIR__ . '/../../resources/metrics_service_v2_descriptor_config.php', self::SERVICE_NAME);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - logMetric: projects/{project}/metrics/{metric}
     * - project: projects/{project}
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
     *           as "<uri>:<port>". Default 'logging.googleapis.com:443'.
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
            throw new ValidationException("Method name $method does not exist");
        }

        if (count($args) < 1) {
            throw new ValidationException("Async methods require a request message");
        }

        $rpcName = substr($method, 0, -5);
        $request = $args[0];
        $optionalArgs = $args[1] ?? [];
        return $this->startAsyncCall($rpcName, $request, $optionalArgs);
    }

    /**
     * Creates a logs-based metric.
     *
     * The async variant is {@see self::createLogMetricAsync()} .
     *
     * @param CreateLogMetricRequest $request      A request to house fields associated with the call.
     * @param array                  $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return LogMetric
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createLogMetric(CreateLogMetricRequest $request, array $optionalArgs = []): LogMetric
    {
        return $this->startApiCall('CreateLogMetric', $request, $optionalArgs)->wait();
    }

    /**
     * Deletes a logs-based metric.
     *
     * The async variant is {@see self::deleteLogMetricAsync()} .
     *
     * @param DeleteLogMetricRequest $request      A request to house fields associated with the call.
     * @param array                  $optionalArgs {
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
    public function deleteLogMetric(DeleteLogMetricRequest $request, array $optionalArgs = []): void
    {
        $this->startApiCall('DeleteLogMetric', $request, $optionalArgs)->wait();
    }

    /**
     * Gets a logs-based metric.
     *
     * The async variant is {@see self::getLogMetricAsync()} .
     *
     * @param GetLogMetricRequest $request      A request to house fields associated with the call.
     * @param array               $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return LogMetric
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getLogMetric(GetLogMetricRequest $request, array $optionalArgs = []): LogMetric
    {
        return $this->startApiCall('GetLogMetric', $request, $optionalArgs)->wait();
    }

    /**
     * Lists logs-based metrics.
     *
     * The async variant is {@see self::listLogMetricsAsync()} .
     *
     * @param ListLogMetricsRequest $request      A request to house fields associated with the call.
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
     */
    public function listLogMetrics(ListLogMetricsRequest $request, array $optionalArgs = []): PagedListResponse
    {
        return $this->startApiCall('ListLogMetrics', $request, $optionalArgs);
    }

    /**
     * Creates or updates a logs-based metric.
     *
     * The async variant is {@see self::updateLogMetricAsync()} .
     *
     * @param UpdateLogMetricRequest $request      A request to house fields associated with the call.
     * @param array                  $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return LogMetric
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function updateLogMetric(UpdateLogMetricRequest $request, array $optionalArgs = []): LogMetric
    {
        return $this->startApiCall('UpdateLogMetric', $request, $optionalArgs)->wait();
    }
}
