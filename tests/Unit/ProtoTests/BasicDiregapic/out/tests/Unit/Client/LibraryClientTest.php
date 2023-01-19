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

namespace Testing\BasicDiregapic\Tests\Unit\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\LongRunning\OperationsClient;
use Google\ApiCore\Testing\GeneratedTest;
use Google\ApiCore\Testing\MockTransport;
use Google\LongRunning\GetOperationRequest;
use Google\LongRunning\Operation;
use Google\Protobuf\Any;
use Google\Protobuf\GPBEmpty;
use Google\Rpc\Code;
use Testing\BasicDiregapic\AddCommentsRequest;
use Testing\BasicDiregapic\AddTagRequest;
use Testing\BasicDiregapic\AddTagResponse;
use Testing\BasicDiregapic\ArchiveBooksRequest;
use Testing\BasicDiregapic\ArchiveBooksResponse;
use Testing\BasicDiregapic\BookFromAnywhereResponse;
use Testing\BasicDiregapic\BookFromArchiveResponse;
use Testing\BasicDiregapic\BookResponse;
use Testing\BasicDiregapic\Client\LibraryClient;
use Testing\BasicDiregapic\CreateBookRequest;
use Testing\BasicDiregapic\CreateInventoryRequest;
use Testing\BasicDiregapic\CreateShelfRequest;
use Testing\BasicDiregapic\DeleteBookRequest;
use Testing\BasicDiregapic\DeleteShelfRequest;
use Testing\BasicDiregapic\FindRelatedBooksRequest;
use Testing\BasicDiregapic\FindRelatedBooksResponse;
use Testing\BasicDiregapic\GetBookFromAbsolutelyAnywhereRequest;
use Testing\BasicDiregapic\GetBookFromAnywhereRequest;
use Testing\BasicDiregapic\GetBookFromArchiveRequest;
use Testing\BasicDiregapic\GetBookRequest;
use Testing\BasicDiregapic\GetShelfRequest;
use Testing\BasicDiregapic\InventoryResponse;
use Testing\BasicDiregapic\ListAggregatedShelvesRequest;
use Testing\BasicDiregapic\ListAggregatedShelvesResponse;
use Testing\BasicDiregapic\ListBooksRequest;
use Testing\BasicDiregapic\ListBooksResponse;
use Testing\BasicDiregapic\ListShelvesRequest;
use Testing\BasicDiregapic\ListShelvesResponse;
use Testing\BasicDiregapic\ListStringsRequest;
use Testing\BasicDiregapic\ListStringsResponse;
use Testing\BasicDiregapic\MergeShelvesRequest;
use Testing\BasicDiregapic\MoveBookRequest;
use Testing\BasicDiregapic\MoveBooksRequest;
use Testing\BasicDiregapic\MoveBooksResponse;
use Testing\BasicDiregapic\PublishSeriesRequest;
use Testing\BasicDiregapic\PublishSeriesResponse;
use Testing\BasicDiregapic\SeriesUuidResponse;
use Testing\BasicDiregapic\ShelfResponse;
use Testing\BasicDiregapic\UpdateBookIndexRequest;
use Testing\BasicDiregapic\UpdateBookRequest;
use stdClass;

/**
 * @group basicdiregapic
 *
 * @group gapic
 */
class LibraryClientTest extends GeneratedTest
{
    /** @return TransportInterface */
    private function createTransport($deserialize = null)
    {
        return new MockTransport($deserialize);
    }

    /** @return CredentialsWrapper */
    private function createCredentials()
    {
        return $this->getMockBuilder(CredentialsWrapper::class)->disableOriginalConstructor()->getMock();
    }

    /** @return LibraryClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new LibraryClient($options);
    }

    /** @test */
    public function addCommentsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GPBEmpty();
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $comments = [];
        $request = (new AddCommentsRequest())
            ->setName($formattedName)
            ->setComments($comments);
        $gapicClient->addComments($request);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/AddComments', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $actualValue = $actualRequestObject->getComments();
        $this->assertProtobufEquals($comments, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function addCommentsExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $comments = [];
        $request = (new AddCommentsRequest())
            ->setName($formattedName)
            ->setComments($comments);
        try {
            $gapicClient->addComments($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function addTagTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new AddTagResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $resource = 'resource-341064690';
        $tag = 'tag114586';
        $request = (new AddTagRequest())
            ->setResource($resource)
            ->setTag($tag);
        $response = $gapicClient->addTag($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/AddTag', $actualFuncCall);
        $actualValue = $actualRequestObject->getResource();
        $this->assertProtobufEquals($resource, $actualValue);
        $actualValue = $actualRequestObject->getTag();
        $this->assertProtobufEquals($tag, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function addTagExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $resource = 'resource-341064690';
        $tag = 'tag114586';
        $request = (new AddTagRequest())
            ->setResource($resource)
            ->setTag($tag);
        try {
            $gapicClient->addTag($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function archiveBooksTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $success = false;
        $expectedResponse = new ArchiveBooksResponse();
        $expectedResponse->setSuccess($success);
        $transport->addResponse($expectedResponse);
        $request = new ArchiveBooksRequest();
        $response = $gapicClient->archiveBooks($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/ArchiveBooks', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function archiveBooksExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        $request = new ArchiveBooksRequest();
        try {
            $gapicClient->archiveBooks($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function createBookTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name2 = 'name2-1052831874';
        $author = 'author-1406328437';
        $title = 'title110371416';
        $read = true;
        $reader = 'reader-934979389';
        $expectedResponse = new BookResponse();
        $expectedResponse->setName($name2);
        $expectedResponse->setAuthor($author);
        $expectedResponse->setTitle($title);
        $expectedResponse->setRead($read);
        $expectedResponse->setReader($reader);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->shelfName('[SHELF]');
        $book = new BookResponse();
        $bookName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $book->setName($bookName);
        $request = (new CreateBookRequest())
            ->setName($formattedName)
            ->setBook($book);
        $response = $gapicClient->createBook($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/CreateBook', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $actualValue = $actualRequestObject->getBook();
        $this->assertProtobufEquals($book, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function createBookExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->shelfName('[SHELF]');
        $book = new BookResponse();
        $bookName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $book->setName($bookName);
        $request = (new CreateBookRequest())
            ->setName($formattedName)
            ->setBook($book);
        try {
            $gapicClient->createBook($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function createInventoryTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name = 'name3373707';
        $expectedResponse = new InventoryResponse();
        $expectedResponse->setName($name);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedParent = $gapicClient->publisherName('[PROJECT]', '[LOCATION]', '[PUBLISHER]');
        $asset = 'asset93121264';
        $parentAsset = 'parentAsset1389473563';
        $assets = [];
        $request = (new CreateInventoryRequest())
            ->setParent($formattedParent)
            ->setAsset($asset)
            ->setParentAsset($parentAsset)
            ->setAssets($assets);
        $response = $gapicClient->createInventory($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/CreateInventory', $actualFuncCall);
        $actualValue = $actualRequestObject->getParent();
        $this->assertProtobufEquals($formattedParent, $actualValue);
        $actualValue = $actualRequestObject->getAsset();
        $this->assertProtobufEquals($asset, $actualValue);
        $actualValue = $actualRequestObject->getParentAsset();
        $this->assertProtobufEquals($parentAsset, $actualValue);
        $actualValue = $actualRequestObject->getAssets();
        $this->assertProtobufEquals($assets, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function createInventoryExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedParent = $gapicClient->publisherName('[PROJECT]', '[LOCATION]', '[PUBLISHER]');
        $asset = 'asset93121264';
        $parentAsset = 'parentAsset1389473563';
        $assets = [];
        $request = (new CreateInventoryRequest())
            ->setParent($formattedParent)
            ->setAsset($asset)
            ->setParentAsset($parentAsset)
            ->setAssets($assets);
        try {
            $gapicClient->createInventory($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function createShelfTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name = 'name3373707';
        $theme = 'theme110327241';
        $internalTheme = 'internalTheme792518087';
        $expectedResponse = new ShelfResponse();
        $expectedResponse->setName($name);
        $expectedResponse->setTheme($theme);
        $expectedResponse->setInternalTheme($internalTheme);
        $transport->addResponse($expectedResponse);
        // Mock request
        $shelf = new ShelfResponse();
        $shelfName = 'shelfName1796941781';
        $shelf->setName($shelfName);
        $request = (new CreateShelfRequest())
            ->setShelf($shelf);
        $response = $gapicClient->createShelf($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/CreateShelf', $actualFuncCall);
        $actualValue = $actualRequestObject->getShelf();
        $this->assertProtobufEquals($shelf, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function createShelfExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $shelf = new ShelfResponse();
        $shelfName = 'shelfName1796941781';
        $shelf->setName($shelfName);
        $request = (new CreateShelfRequest())
            ->setShelf($shelf);
        try {
            $gapicClient->createShelf($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function deleteBookTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GPBEmpty();
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $request = (new DeleteBookRequest())
            ->setName($formattedName);
        $gapicClient->deleteBook($request);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/DeleteBook', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function deleteBookExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $request = (new DeleteBookRequest())
            ->setName($formattedName);
        try {
            $gapicClient->deleteBook($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function deleteShelfTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GPBEmpty();
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->shelfName('[SHELF]');
        $request = (new DeleteShelfRequest())
            ->setName($formattedName);
        $gapicClient->deleteShelf($request);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/DeleteShelf', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function deleteShelfExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->shelfName('[SHELF]');
        $request = (new DeleteShelfRequest())
            ->setName($formattedName);
        try {
            $gapicClient->deleteShelf($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function findRelatedBooksTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $nextPageToken = '';
        $namesElement = 'namesElement-249113339';
        $names = [
            $namesElement,
        ];
        $expectedResponse = new FindRelatedBooksResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setNames($names);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedNames = [
            $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]'),
        ];
        $formattedShelves = [
            $gapicClient->shelfName('[SHELF]'),
        ];
        $request = (new FindRelatedBooksRequest())
            ->setNames($formattedNames)
            ->setShelves($formattedShelves);
        $response = $gapicClient->findRelatedBooks($request);
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getNames()[0], $resources[0]);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/FindRelatedBooks', $actualFuncCall);
        $actualValue = $actualRequestObject->getNames();
        $this->assertProtobufEquals($formattedNames, $actualValue);
        $actualValue = $actualRequestObject->getShelves();
        $this->assertProtobufEquals($formattedShelves, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function findRelatedBooksExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedNames = [
            $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]'),
        ];
        $formattedShelves = [
            $gapicClient->shelfName('[SHELF]'),
        ];
        $request = (new FindRelatedBooksRequest())
            ->setNames($formattedNames)
            ->setShelves($formattedShelves);
        try {
            $gapicClient->findRelatedBooks($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getBigBookTest()
    {
        $operationsTransport = $this->createTransport();
        $operationsClient = new OperationsClient([
            'apiEndpoint' => '',
            'transport' => $operationsTransport,
            'credentials' => $this->createCredentials(),
        ]);
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
            'operationsClient' => $operationsClient,
        ]);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
        // Mock response
        $incompleteOperation = new Operation();
        $incompleteOperation->setName('operations/getBigBookTest');
        $incompleteOperation->setDone(false);
        $transport->addResponse($incompleteOperation);
        $name2 = 'name2-1052831874';
        $author = 'author-1406328437';
        $title = 'title110371416';
        $read = true;
        $reader = 'reader-934979389';
        $expectedResponse = new BookResponse();
        $expectedResponse->setName($name2);
        $expectedResponse->setAuthor($author);
        $expectedResponse->setTitle($title);
        $expectedResponse->setRead($read);
        $expectedResponse->setReader($reader);
        $anyResponse = new Any();
        $anyResponse->setValue($expectedResponse->serializeToString());
        $completeOperation = new Operation();
        $completeOperation->setName('operations/getBigBookTest');
        $completeOperation->setDone(true);
        $completeOperation->setResponse($anyResponse);
        $operationsTransport->addResponse($completeOperation);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $request = (new GetBookRequest())
            ->setName($formattedName);
        $response = $gapicClient->getBigBook($request);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $apiRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($apiRequests));
        $operationsRequestsEmpty = $operationsTransport->popReceivedCalls();
        $this->assertSame(0, count($operationsRequestsEmpty));
        $actualApiFuncCall = $apiRequests[0]->getFuncCall();
        $actualApiRequestObject = $apiRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/GetBigBook', $actualApiFuncCall);
        $actualValue = $actualApiRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/getBigBookTest');
        $response->pollUntilComplete([
            'initialPollDelayMillis' => 1,
        ]);
        $this->assertTrue($response->isDone());
        $this->assertEquals($expectedResponse, $response->getResult());
        $apiRequestsEmpty = $transport->popReceivedCalls();
        $this->assertSame(0, count($apiRequestsEmpty));
        $operationsRequests = $operationsTransport->popReceivedCalls();
        $this->assertSame(1, count($operationsRequests));
        $actualOperationsFuncCall = $operationsRequests[0]->getFuncCall();
        $actualOperationsRequestObject = $operationsRequests[0]->getRequestObject();
        $this->assertSame('/google.longrunning.Operations/GetOperation', $actualOperationsFuncCall);
        $this->assertEquals($expectedOperationsRequestObject, $actualOperationsRequestObject);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
    }

    /** @test */
    public function getBigBookExceptionTest()
    {
        $operationsTransport = $this->createTransport();
        $operationsClient = new OperationsClient([
            'apiEndpoint' => '',
            'transport' => $operationsTransport,
            'credentials' => $this->createCredentials(),
        ]);
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
            'operationsClient' => $operationsClient,
        ]);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
        // Mock response
        $incompleteOperation = new Operation();
        $incompleteOperation->setName('operations/getBigBookTest');
        $incompleteOperation->setDone(false);
        $transport->addResponse($incompleteOperation);
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $operationsTransport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $request = (new GetBookRequest())
            ->setName($formattedName);
        $response = $gapicClient->getBigBook($request);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/getBigBookTest');
        try {
            $response->pollUntilComplete([
                'initialPollDelayMillis' => 1,
            ]);
            // If the pollUntilComplete() method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stubs are exhausted
        $transport->popReceivedCalls();
        $operationsTransport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
    }

    /** @test */
    public function getBigNothingTest()
    {
        $operationsTransport = $this->createTransport();
        $operationsClient = new OperationsClient([
            'apiEndpoint' => '',
            'transport' => $operationsTransport,
            'credentials' => $this->createCredentials(),
        ]);
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
            'operationsClient' => $operationsClient,
        ]);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
        // Mock response
        $incompleteOperation = new Operation();
        $incompleteOperation->setName('operations/getBigNothingTest');
        $incompleteOperation->setDone(false);
        $transport->addResponse($incompleteOperation);
        $expectedResponse = new GPBEmpty();
        $anyResponse = new Any();
        $anyResponse->setValue($expectedResponse->serializeToString());
        $completeOperation = new Operation();
        $completeOperation->setName('operations/getBigNothingTest');
        $completeOperation->setDone(true);
        $completeOperation->setResponse($anyResponse);
        $operationsTransport->addResponse($completeOperation);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $request = (new GetBookRequest())
            ->setName($formattedName);
        $response = $gapicClient->getBigNothing($request);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $apiRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($apiRequests));
        $operationsRequestsEmpty = $operationsTransport->popReceivedCalls();
        $this->assertSame(0, count($operationsRequestsEmpty));
        $actualApiFuncCall = $apiRequests[0]->getFuncCall();
        $actualApiRequestObject = $apiRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/GetBigNothing', $actualApiFuncCall);
        $actualValue = $actualApiRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/getBigNothingTest');
        $response->pollUntilComplete([
            'initialPollDelayMillis' => 1,
        ]);
        $this->assertTrue($response->isDone());
        $this->assertEquals($expectedResponse, $response->getResult());
        $apiRequestsEmpty = $transport->popReceivedCalls();
        $this->assertSame(0, count($apiRequestsEmpty));
        $operationsRequests = $operationsTransport->popReceivedCalls();
        $this->assertSame(1, count($operationsRequests));
        $actualOperationsFuncCall = $operationsRequests[0]->getFuncCall();
        $actualOperationsRequestObject = $operationsRequests[0]->getRequestObject();
        $this->assertSame('/google.longrunning.Operations/GetOperation', $actualOperationsFuncCall);
        $this->assertEquals($expectedOperationsRequestObject, $actualOperationsRequestObject);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
    }

    /** @test */
    public function getBigNothingExceptionTest()
    {
        $operationsTransport = $this->createTransport();
        $operationsClient = new OperationsClient([
            'apiEndpoint' => '',
            'transport' => $operationsTransport,
            'credentials' => $this->createCredentials(),
        ]);
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
            'operationsClient' => $operationsClient,
        ]);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
        // Mock response
        $incompleteOperation = new Operation();
        $incompleteOperation->setName('operations/getBigNothingTest');
        $incompleteOperation->setDone(false);
        $transport->addResponse($incompleteOperation);
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $operationsTransport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $request = (new GetBookRequest())
            ->setName($formattedName);
        $response = $gapicClient->getBigNothing($request);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/getBigNothingTest');
        try {
            $response->pollUntilComplete([
                'initialPollDelayMillis' => 1,
            ]);
            // If the pollUntilComplete() method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stubs are exhausted
        $transport->popReceivedCalls();
        $operationsTransport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
    }

    /** @test */
    public function getBookTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name2 = 'name2-1052831874';
        $author = 'author-1406328437';
        $title = 'title110371416';
        $read = true;
        $reader = 'reader-934979389';
        $expectedResponse = new BookResponse();
        $expectedResponse->setName($name2);
        $expectedResponse->setAuthor($author);
        $expectedResponse->setTitle($title);
        $expectedResponse->setRead($read);
        $expectedResponse->setReader($reader);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $request = (new GetBookRequest())
            ->setName($formattedName);
        $response = $gapicClient->getBook($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/GetBook', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getBookExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $request = (new GetBookRequest())
            ->setName($formattedName);
        try {
            $gapicClient->getBook($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getBookFromAbsolutelyAnywhereTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name2 = 'name2-1052831874';
        $author = 'author-1406328437';
        $title = 'title110371416';
        $read = true;
        $expectedResponse = new BookFromAnywhereResponse();
        $expectedResponse->setName($name2);
        $expectedResponse->setAuthor($author);
        $expectedResponse->setTitle($title);
        $expectedResponse->setRead($read);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $request = (new GetBookFromAbsolutelyAnywhereRequest())
            ->setName($formattedName);
        $response = $gapicClient->getBookFromAbsolutelyAnywhere($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/GetBookFromAbsolutelyAnywhere', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getBookFromAbsolutelyAnywhereExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $request = (new GetBookFromAbsolutelyAnywhereRequest())
            ->setName($formattedName);
        try {
            $gapicClient->getBookFromAbsolutelyAnywhere($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getBookFromAnywhereTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name2 = 'name2-1052831874';
        $author = 'author-1406328437';
        $title = 'title110371416';
        $read = true;
        $expectedResponse = new BookFromAnywhereResponse();
        $expectedResponse->setName($name2);
        $expectedResponse->setAuthor($author);
        $expectedResponse->setTitle($title);
        $expectedResponse->setRead($read);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $formattedAltBookName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $formattedPlace = $gapicClient->locationName('[PROJECT]', '[LOCATION]');
        $formattedFolder = $gapicClient->folderName('[FOLDER]');
        $request = (new GetBookFromAnywhereRequest())
            ->setName($formattedName)
            ->setAltBookName($formattedAltBookName)
            ->setPlace($formattedPlace)
            ->setFolder($formattedFolder);
        $response = $gapicClient->getBookFromAnywhere($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/GetBookFromAnywhere', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $actualValue = $actualRequestObject->getAltBookName();
        $this->assertProtobufEquals($formattedAltBookName, $actualValue);
        $actualValue = $actualRequestObject->getPlace();
        $this->assertProtobufEquals($formattedPlace, $actualValue);
        $actualValue = $actualRequestObject->getFolder();
        $this->assertProtobufEquals($formattedFolder, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getBookFromAnywhereExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $formattedAltBookName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $formattedPlace = $gapicClient->locationName('[PROJECT]', '[LOCATION]');
        $formattedFolder = $gapicClient->folderName('[FOLDER]');
        $request = (new GetBookFromAnywhereRequest())
            ->setName($formattedName)
            ->setAltBookName($formattedAltBookName)
            ->setPlace($formattedPlace)
            ->setFolder($formattedFolder);
        try {
            $gapicClient->getBookFromAnywhere($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getBookFromArchiveTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name2 = 'name2-1052831874';
        $author = 'author-1406328437';
        $title = 'title110371416';
        $read = true;
        $expectedResponse = new BookFromArchiveResponse();
        $expectedResponse->setName($name2);
        $expectedResponse->setAuthor($author);
        $expectedResponse->setTitle($title);
        $expectedResponse->setRead($read);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->archivedBookName('[ARCHIVE]', '[BOOK]');
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $request = (new GetBookFromArchiveRequest())
            ->setName($formattedName)
            ->setParent($formattedParent);
        $response = $gapicClient->getBookFromArchive($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/GetBookFromArchive', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $actualValue = $actualRequestObject->getParent();
        $this->assertProtobufEquals($formattedParent, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getBookFromArchiveExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->archivedBookName('[ARCHIVE]', '[BOOK]');
        $formattedParent = $gapicClient->projectName('[PROJECT]');
        $request = (new GetBookFromArchiveRequest())
            ->setName($formattedName)
            ->setParent($formattedParent);
        try {
            $gapicClient->getBookFromArchive($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getShelfTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name2 = 'name2-1052831874';
        $theme = 'theme110327241';
        $internalTheme = 'internalTheme792518087';
        $expectedResponse = new ShelfResponse();
        $expectedResponse->setName($name2);
        $expectedResponse->setTheme($theme);
        $expectedResponse->setInternalTheme($internalTheme);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->shelfName('[SHELF]');
        $options = 'options-1249474914';
        $request = (new GetShelfRequest())
            ->setName($formattedName)
            ->setOptions($options);
        $response = $gapicClient->getShelf($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/GetShelf', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $actualValue = $actualRequestObject->getOptions();
        $this->assertProtobufEquals($options, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getShelfExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->shelfName('[SHELF]');
        $options = 'options-1249474914';
        $request = (new GetShelfRequest())
            ->setName($formattedName)
            ->setOptions($options);
        try {
            $gapicClient->getShelf($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listAggregatedShelvesTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $nextPageToken = '';
        $shelvesElement = new ShelfResponse();
        $shelves = [
            $shelvesElement,
        ];
        $expectedResponse = new ListAggregatedShelvesResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setShelves($shelves);
        $transport->addResponse($expectedResponse);
        $request = new ListAggregatedShelvesRequest();
        $response = $gapicClient->listAggregatedShelves($request);
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getShelves()[0], $resources[0]);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/ListAggregatedShelves', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listAggregatedShelvesExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        $request = new ListAggregatedShelvesRequest();
        try {
            $gapicClient->listAggregatedShelves($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listBooksTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $nextPageToken = '';
        $booksElement = new BookResponse();
        $books = [
            $booksElement,
        ];
        $expectedResponse = new ListBooksResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setBooks($books);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->shelfName('[SHELF]');
        $request = (new ListBooksRequest())
            ->setName($formattedName);
        $response = $gapicClient->listBooks($request);
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getBooks()[0], $resources[0]);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/ListBooks', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listBooksExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->shelfName('[SHELF]');
        $request = (new ListBooksRequest())
            ->setName($formattedName);
        try {
            $gapicClient->listBooks($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listShelvesTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $nextPageToken = 'nextPageToken-1530815211';
        $expectedResponse = new ListShelvesResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $transport->addResponse($expectedResponse);
        $request = new ListShelvesRequest();
        $response = $gapicClient->listShelves($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/ListShelves', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listShelvesExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        $request = new ListShelvesRequest();
        try {
            $gapicClient->listShelves($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listStringsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $nextPageToken = '';
        $stringsElement = 'stringsElement474465855';
        $strings = [
            $stringsElement,
        ];
        $expectedResponse = new ListStringsResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setStrings($strings);
        $transport->addResponse($expectedResponse);
        $request = new ListStringsRequest();
        $response = $gapicClient->listStrings($request);
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getStrings()[0], $resources[0]);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/ListStrings', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listStringsExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        $request = new ListStringsRequest();
        try {
            $gapicClient->listStrings($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function longRunningArchiveBooksTest()
    {
        $operationsTransport = $this->createTransport();
        $operationsClient = new OperationsClient([
            'apiEndpoint' => '',
            'transport' => $operationsTransport,
            'credentials' => $this->createCredentials(),
        ]);
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
            'operationsClient' => $operationsClient,
        ]);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
        // Mock response
        $incompleteOperation = new Operation();
        $incompleteOperation->setName('operations/longRunningArchiveBooksTest');
        $incompleteOperation->setDone(false);
        $transport->addResponse($incompleteOperation);
        $success = false;
        $expectedResponse = new ArchiveBooksResponse();
        $expectedResponse->setSuccess($success);
        $anyResponse = new Any();
        $anyResponse->setValue($expectedResponse->serializeToString());
        $completeOperation = new Operation();
        $completeOperation->setName('operations/longRunningArchiveBooksTest');
        $completeOperation->setDone(true);
        $completeOperation->setResponse($anyResponse);
        $operationsTransport->addResponse($completeOperation);
        $request = new ArchiveBooksRequest();
        $response = $gapicClient->longRunningArchiveBooks($request);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $apiRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($apiRequests));
        $operationsRequestsEmpty = $operationsTransport->popReceivedCalls();
        $this->assertSame(0, count($operationsRequestsEmpty));
        $actualApiFuncCall = $apiRequests[0]->getFuncCall();
        $actualApiRequestObject = $apiRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/LongRunningArchiveBooks', $actualApiFuncCall);
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/longRunningArchiveBooksTest');
        $response->pollUntilComplete([
            'initialPollDelayMillis' => 1,
        ]);
        $this->assertTrue($response->isDone());
        $this->assertEquals($expectedResponse, $response->getResult());
        $apiRequestsEmpty = $transport->popReceivedCalls();
        $this->assertSame(0, count($apiRequestsEmpty));
        $operationsRequests = $operationsTransport->popReceivedCalls();
        $this->assertSame(1, count($operationsRequests));
        $actualOperationsFuncCall = $operationsRequests[0]->getFuncCall();
        $actualOperationsRequestObject = $operationsRequests[0]->getRequestObject();
        $this->assertSame('/google.longrunning.Operations/GetOperation', $actualOperationsFuncCall);
        $this->assertEquals($expectedOperationsRequestObject, $actualOperationsRequestObject);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
    }

    /** @test */
    public function longRunningArchiveBooksExceptionTest()
    {
        $operationsTransport = $this->createTransport();
        $operationsClient = new OperationsClient([
            'apiEndpoint' => '',
            'transport' => $operationsTransport,
            'credentials' => $this->createCredentials(),
        ]);
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
            'operationsClient' => $operationsClient,
        ]);
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
        // Mock response
        $incompleteOperation = new Operation();
        $incompleteOperation->setName('operations/longRunningArchiveBooksTest');
        $incompleteOperation->setDone(false);
        $transport->addResponse($incompleteOperation);
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $operationsTransport->addResponse(null, $status);
        $request = new ArchiveBooksRequest();
        $response = $gapicClient->longRunningArchiveBooks($request);
        $this->assertFalse($response->isDone());
        $this->assertNull($response->getResult());
        $expectedOperationsRequestObject = new GetOperationRequest();
        $expectedOperationsRequestObject->setName('operations/longRunningArchiveBooksTest');
        try {
            $response->pollUntilComplete([
                'initialPollDelayMillis' => 1,
            ]);
            // If the pollUntilComplete() method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stubs are exhausted
        $transport->popReceivedCalls();
        $operationsTransport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
        $this->assertTrue($operationsTransport->isExhausted());
    }

    /** @test */
    public function mergeShelvesTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name2 = 'name2-1052831874';
        $theme = 'theme110327241';
        $internalTheme = 'internalTheme792518087';
        $expectedResponse = new ShelfResponse();
        $expectedResponse->setName($name2);
        $expectedResponse->setTheme($theme);
        $expectedResponse->setInternalTheme($internalTheme);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->shelfName('[SHELF]');
        $formattedOtherShelfName = $gapicClient->shelfName('[SHELF]');
        $request = (new MergeShelvesRequest())
            ->setName($formattedName)
            ->setOtherShelfName($formattedOtherShelfName);
        $response = $gapicClient->mergeShelves($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/MergeShelves', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $actualValue = $actualRequestObject->getOtherShelfName();
        $this->assertProtobufEquals($formattedOtherShelfName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function mergeShelvesExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->shelfName('[SHELF]');
        $formattedOtherShelfName = $gapicClient->shelfName('[SHELF]');
        $request = (new MergeShelvesRequest())
            ->setName($formattedName)
            ->setOtherShelfName($formattedOtherShelfName);
        try {
            $gapicClient->mergeShelves($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function moveBookTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name2 = 'name2-1052831874';
        $author = 'author-1406328437';
        $title = 'title110371416';
        $read = true;
        $reader = 'reader-934979389';
        $expectedResponse = new BookResponse();
        $expectedResponse->setName($name2);
        $expectedResponse->setAuthor($author);
        $expectedResponse->setTitle($title);
        $expectedResponse->setRead($read);
        $expectedResponse->setReader($reader);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $formattedOtherShelfName = $gapicClient->shelfName('[SHELF]');
        $request = (new MoveBookRequest())
            ->setName($formattedName)
            ->setOtherShelfName($formattedOtherShelfName);
        $response = $gapicClient->moveBook($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/MoveBook', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $actualValue = $actualRequestObject->getOtherShelfName();
        $this->assertProtobufEquals($formattedOtherShelfName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function moveBookExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $formattedOtherShelfName = $gapicClient->shelfName('[SHELF]');
        $request = (new MoveBookRequest())
            ->setName($formattedName)
            ->setOtherShelfName($formattedOtherShelfName);
        try {
            $gapicClient->moveBook($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function moveBooksTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $success = false;
        $expectedResponse = new MoveBooksResponse();
        $expectedResponse->setSuccess($success);
        $transport->addResponse($expectedResponse);
        $request = new MoveBooksRequest();
        $response = $gapicClient->moveBooks($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/MoveBooks', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function moveBooksExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        $request = new MoveBooksRequest();
        try {
            $gapicClient->moveBooks($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function privateListShelvesTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name = 'name3373707';
        $author = 'author-1406328437';
        $title = 'title110371416';
        $read = true;
        $reader = 'reader-934979389';
        $expectedResponse = new BookResponse();
        $expectedResponse->setName($name);
        $expectedResponse->setAuthor($author);
        $expectedResponse->setTitle($title);
        $expectedResponse->setRead($read);
        $expectedResponse->setReader($reader);
        $transport->addResponse($expectedResponse);
        $request = new ListShelvesRequest();
        $response = $gapicClient->privateListShelves($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/PrivateListShelves', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function privateListShelvesExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        $request = new ListShelvesRequest();
        try {
            $gapicClient->privateListShelves($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function publishSeriesTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new PublishSeriesResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $shelf = new ShelfResponse();
        $shelfName = 'shelfName1796941781';
        $shelf->setName($shelfName);
        $books = [];
        $seriesUuid = new SeriesUuidResponse();
        $genres = [];
        $request = (new PublishSeriesRequest())
            ->setShelf($shelf)
            ->setBooks($books)
            ->setSeriesUuid($seriesUuid)
            ->setGenres($genres);
        $response = $gapicClient->publishSeries($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/PublishSeries', $actualFuncCall);
        $actualValue = $actualRequestObject->getShelf();
        $this->assertProtobufEquals($shelf, $actualValue);
        $actualValue = $actualRequestObject->getBooks();
        $this->assertProtobufEquals($books, $actualValue);
        $actualValue = $actualRequestObject->getSeriesUuid();
        $this->assertProtobufEquals($seriesUuid, $actualValue);
        $actualValue = $actualRequestObject->getGenres();
        $this->assertProtobufEquals($genres, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function publishSeriesExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $shelf = new ShelfResponse();
        $shelfName = 'shelfName1796941781';
        $shelf->setName($shelfName);
        $books = [];
        $seriesUuid = new SeriesUuidResponse();
        $genres = [];
        $request = (new PublishSeriesRequest())
            ->setShelf($shelf)
            ->setBooks($books)
            ->setSeriesUuid($seriesUuid)
            ->setGenres($genres);
        try {
            $gapicClient->publishSeries($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function saveBookTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GPBEmpty();
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $request = (new BookResponse())
            ->setName($formattedName);
        $gapicClient->saveBook($request);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/SaveBook', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function saveBookExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $request = (new BookResponse())
            ->setName($formattedName);
        try {
            $gapicClient->saveBook($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function updateBookTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $name2 = 'name2-1052831874';
        $author = 'author-1406328437';
        $title = 'title110371416';
        $read = true;
        $reader = 'reader-934979389';
        $expectedResponse = new BookResponse();
        $expectedResponse->setName($name2);
        $expectedResponse->setAuthor($author);
        $expectedResponse->setTitle($title);
        $expectedResponse->setRead($read);
        $expectedResponse->setReader($reader);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $book = new BookResponse();
        $bookName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $book->setName($bookName);
        $request = (new UpdateBookRequest())
            ->setName($formattedName)
            ->setBook($book);
        $response = $gapicClient->updateBook($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/UpdateBook', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $actualValue = $actualRequestObject->getBook();
        $this->assertProtobufEquals($book, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function updateBookExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $book = new BookResponse();
        $bookName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $book->setName($bookName);
        $request = (new UpdateBookRequest())
            ->setName($formattedName)
            ->setBook($book);
        try {
            $gapicClient->updateBook($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function updateBookIndexTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GPBEmpty();
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $indexName = 'indexName746962392';
        $indexMapValue = 'indexMapValue980783207';
        $indexMap = [
            'indexMapKey' => $indexMapValue,
        ];
        $request = (new UpdateBookIndexRequest())
            ->setName($formattedName)
            ->setIndexName($indexName)
            ->setIndexMap($indexMap);
        $gapicClient->updateBookIndex($request);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/UpdateBookIndex', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $actualValue = $actualRequestObject->getIndexName();
        $this->assertProtobufEquals($indexName, $actualValue);
        $actualValue = $actualRequestObject->getIndexMap();
        $this->assertProtobufEquals($indexMap, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function updateBookIndexExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $indexName = 'indexName746962392';
        $indexMapValue = 'indexMapValue980783207';
        $indexMap = [
            'indexMapKey' => $indexMapValue,
        ];
        $request = (new UpdateBookIndexRequest())
            ->setName($formattedName)
            ->setIndexName($indexName)
            ->setIndexMap($indexMap);
        try {
            $gapicClient->updateBookIndex($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function addCommentsAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GPBEmpty();
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedName = $gapicClient->bookName('[SHELF]', '[BOOK_ONE]', '[BOOK_TWO]');
        $comments = [];
        $request = (new AddCommentsRequest())
            ->setName($formattedName)
            ->setComments($comments);
        $gapicClient->addCommentsAsync($request)->wait();
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.example.library.v1.Library/AddComments', $actualFuncCall);
        $actualValue = $actualRequestObject->getName();
        $this->assertProtobufEquals($formattedName, $actualValue);
        $actualValue = $actualRequestObject->getComments();
        $this->assertProtobufEquals($comments, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
