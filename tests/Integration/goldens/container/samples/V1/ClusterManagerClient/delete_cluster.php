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
 * This file was automatically generated - do not edit!
 */

require_once __DIR__ . '/../../../vendor/autoload.php';

// [START container_v1_generated_ClusterManager_DeleteCluster_sync]
use Google\ApiCore\ApiException;
use Google\Cloud\Container\V1\Client\ClusterManagerClient;
use Google\Cloud\Container\V1\DeleteClusterRequest;
use Google\Cloud\Container\V1\Operation;

/**
 * Deletes the cluster, including the Kubernetes endpoint and all worker
 * nodes.
 *
 * Firewalls and routes that were configured during cluster creation
 * are also deleted.
 *
 * Other Google Compute Engine resources that might be in use by the cluster,
 * such as load balancer resources, are not deleted if they weren't present
 * when the cluster was initially created.
 *
 * This sample has been automatically generated and should be regarded as a code
 * template only. It will require modifications to work:
 *  - It may require correct/in-range values for request initialization.
 *  - It may require specifying regional endpoints when creating the service client,
 *    please see the apiEndpoint client configuration option for more details.
 */
function delete_cluster_sample(): void
{
    // Create a client.
    $clusterManagerClient = new ClusterManagerClient();

    // Prepare the request message.
    $request = new DeleteClusterRequest();

    // Call the API and handle any network failures.
    try {
        /** @var Operation $response */
        $response = $clusterManagerClient->deleteCluster($request);
        printf('Response data: %s' . PHP_EOL, $response->serializeToJsonString());
    } catch (ApiException $ex) {
        printf('Call failed with message: %s' . PHP_EOL, $ex->getMessage());
    }
}
// [END container_v1_generated_ClusterManager_DeleteCluster_sync]
