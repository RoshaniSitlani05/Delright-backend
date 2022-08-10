<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/pubsub/v1/schema.proto

namespace GPBMetadata\Google\Pubsub\V1;

class Schema
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
google/pubsub/v1/schema.protogoogle.pubsub.v1google/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/protobuf/empty.proto"�
Schema
name (	B�A+
type (2.google.pubsub.v1.Schema.Type

definition (	";
Type
TYPE_UNSPECIFIED 
PROTOCOL_BUFFER
AVRO:F�AC
pubsub.googleapis.com/Schema#projects/{project}/schemas/{schema}"�
CreateSchemaRequest4
parent (	B$�A�Apubsub.googleapis.com/Schema-
schema (2.google.pubsub.v1.SchemaB�A
	schema_id (	"r
GetSchemaRequest2
name (	B$�A�A
pubsub.googleapis.com/Schema*
view (2.google.pubsub.v1.SchemaView"�
ListSchemasRequestC
parent (	B3�A�A-
+cloudresourcemanager.googleapis.com/Project*
view (2.google.pubsub.v1.SchemaView
	page_size (

page_token (	"Y
ListSchemasResponse)
schemas (2.google.pubsub.v1.Schema
next_page_token (	"I
DeleteSchemaRequest2
name (	B$�A�A
pubsub.googleapis.com/Schema"�
ValidateSchemaRequestC
parent (	B3�A�A-
+cloudresourcemanager.googleapis.com/Project-
schema (2.google.pubsub.v1.SchemaB�A"
ValidateSchemaResponse"�
ValidateMessageRequestC
parent (	B3�A�A-
+cloudresourcemanager.googleapis.com/Project1
name (	B!�A
pubsub.googleapis.com/SchemaH *
schema (2.google.pubsub.v1.SchemaH 
message (,
encoding (2.google.pubsub.v1.EncodingB
schema_spec"
ValidateMessageResponse*>

SchemaView
SCHEMA_VIEW_UNSPECIFIED 	
BASIC
FULL*:
Encoding
ENCODING_UNSPECIFIED 
JSON

BINARY2�
SchemaService�
CreateSchema%.google.pubsub.v1.CreateSchemaRequest.google.pubsub.v1.Schema"I���)"/v1/{parent=projects/*}/schemas:schema�Aparent,schema,schema_idy
	GetSchema".google.pubsub.v1.GetSchemaRequest.google.pubsub.v1.Schema".���!/v1/{name=projects/*/schemas/*}�Aname�
ListSchemas$.google.pubsub.v1.ListSchemasRequest%.google.pubsub.v1.ListSchemasResponse"0���!/v1/{parent=projects/*}/schemas�Aparent}
DeleteSchema%.google.pubsub.v1.DeleteSchemaRequest.google.protobuf.Empty".���!*/v1/{name=projects/*/schemas/*}�Aname�
ValidateSchema\'.google.pubsub.v1.ValidateSchemaRequest(.google.pubsub.v1.ValidateSchemaResponse"C���-"(/v1/{parent=projects/*}/schemas:validate:*�Aparent,schema�
ValidateMessage(.google.pubsub.v1.ValidateMessageRequest).google.pubsub.v1.ValidateMessageResponse":���4"//v1/{parent=projects/*}/schemas:validateMessage:*p�Apubsub.googleapis.com�AUhttps://www.googleapis.com/auth/cloud-platform,https://www.googleapis.com/auth/pubsubB�
com.google.pubsub.v1BSchemaProtoPZ6google.golang.org/genproto/googleapis/pubsub/v1;pubsub��Google.Cloud.PubSub.V1�Google\\Cloud\\PubSub\\V1�Google::Cloud::PubSub::V1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

