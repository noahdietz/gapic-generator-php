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
 * This file was automatically generated - do not edit!
 */

require_once __DIR__ . '/../../../vendor/autoload.php';

// [START logging_v2_generated_ConfigServiceV2_GetView_sync]
use Google\ApiCore\ApiException;
use Google\Cloud\Logging\V2\Client\ConfigServiceV2Client;
use Google\Cloud\Logging\V2\GetViewRequest;
use Google\Cloud\Logging\V2\LogView;

/**
 * Gets a view.
 *
 * @param string $formattedName The resource name of the policy:
 *
 *                              "projects/[PROJECT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]/views/[VIEW_ID]"
 *
 *                              Example:
 *                              `"projects/my-project-id/locations/my-location/buckets/my-bucket-id/views/my-view-id"`. Please see
 *                              {@see ConfigServiceV2Client::logViewName()} for help formatting this field.
 */
function get_view_sample(string $formattedName): void
{
    // Create a client.
    $configServiceV2Client = new ConfigServiceV2Client();

    // Prepare the request message.
    $request = (new GetViewRequest())
        ->setName($formattedName);

    // Call the API and handle any network failures.
    try {
        /** @var LogView $response */
        $response = $configServiceV2Client->getView($request);
        printf('Response data: %s' . PHP_EOL, $response->serializeToJsonString());
    } catch (ApiException $ex) {
        printf('Call failed with message: %s' . PHP_EOL, $ex->getMessage());
    }
}

/**
 * Helper to execute the sample.
 *
 * This sample has been automatically generated and should be regarded as a code
 * template only. It will require modifications to work:
 *  - It may require correct/in-range values for request initialization.
 *  - It may require specifying regional endpoints when creating the service client,
 *    please see the apiEndpoint client configuration option for more details.
 */
function callSample(): void
{
    $formattedName = ConfigServiceV2Client::logViewName(
        '[PROJECT]',
        '[LOCATION]',
        '[BUCKET]',
        '[VIEW]'
    );

    get_view_sample($formattedName);
}
// [END logging_v2_generated_ConfigServiceV2_GetView_sync]
