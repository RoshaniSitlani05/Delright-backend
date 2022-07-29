<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dialogflow/v2/context.proto

namespace GPBMetadata\Google\Cloud\Dialogflow\V2;

class Context
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
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Struct::initOnce();
        $pool->internalAddGeneratedFile(
            '
�"
(google/cloud/dialogflow/v2/context.protogoogle.cloud.dialogflow.v2google/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/protobuf/empty.proto google/protobuf/field_mask.protogoogle/protobuf/struct.proto"�
Context
name (	B�A
lifespan_count (B�A0

parameters (2.google.protobuf.StructB�A:��A�
!dialogflow.googleapis.com/Context>projects/{project}/agent/sessions/{session}/contexts/{context}fprojects/{project}/agent/environments/{environment}/users/{user}/sessions/{session}/contexts/{context}Sprojects/{project}/locations/{location}/agent/sessions/{session}/contexts/{context}{projects/{project}/locations/{location}/agent/environments/{environment}/users/{user}/sessions/{session}/contexts/{context}"�
ListContextsRequest9
parent (	B)�A�A#!dialogflow.googleapis.com/Context
	page_size (B�A

page_token (	B�A"f
ListContextsResponse5
contexts (2#.google.cloud.dialogflow.v2.Context
next_page_token (	"L
GetContextRequest7
name (	B)�A�A#
!dialogflow.googleapis.com/Context"�
CreateContextRequest9
parent (	B)�A�A#!dialogflow.googleapis.com/Context9
context (2#.google.cloud.dialogflow.v2.ContextB�A"�
UpdateContextRequest9
context (2#.google.cloud.dialogflow.v2.ContextB�A4
update_mask (2.google.protobuf.FieldMaskB�A"O
DeleteContextRequest7
name (	B)�A�A#
!dialogflow.googleapis.com/Context"U
DeleteAllContextsRequest9
parent (	B)�A�A#!dialogflow.googleapis.com/Context2�
Contexts�
ListContexts/.google.cloud.dialogflow.v2.ListContextsRequest0.google.cloud.dialogflow.v2.ListContextsResponse"�����1/v2/{parent=projects/*/agent/sessions/*}/contextsZJH/v2/{parent=projects/*/agent/environments/*/users/*/sessions/*}/contextsZ?=/v2/{parent=projects/*/locations/*/agent/sessions/*}/contextsZVT/v2/{parent=projects/*/locations/*/agent/environments/*/users/*/sessions/*}/contexts�Aparent�

GetContext-.google.cloud.dialogflow.v2.GetContextRequest#.google.cloud.dialogflow.v2.Context"�����1/v2/{name=projects/*/agent/sessions/*/contexts/*}ZJH/v2/{name=projects/*/agent/environments/*/users/*/sessions/*/contexts/*}Z?=/v2/{name=projects/*/locations/*/agent/sessions/*/contexts/*}ZVT/v2/{name=projects/*/locations/*/agent/environments/*/users/*/sessions/*/contexts/*}�Aname�
CreateContext0.google.cloud.dialogflow.v2.CreateContextRequest#.google.cloud.dialogflow.v2.Context"�����"1/v2/{parent=projects/*/agent/sessions/*}/contexts:contextZS"H/v2/{parent=projects/*/agent/environments/*/users/*/sessions/*}/contexts:contextZH"=/v2/{parent=projects/*/locations/*/agent/sessions/*}/contexts:contextZ_"T/v2/{parent=projects/*/locations/*/agent/environments/*/users/*/sessions/*}/contexts:context�Aparent,context�
UpdateContext0.google.cloud.dialogflow.v2.UpdateContextRequest#.google.cloud.dialogflow.v2.Context"�����29/v2/{context.name=projects/*/agent/sessions/*/contexts/*}:contextZ[2P/v2/{context.name=projects/*/agent/environments/*/users/*/sessions/*/contexts/*}:contextZP2E/v2/{context.name=projects/*/locations/*/agent/sessions/*/contexts/*}:contextZg2\\/v2/{context.name=projects/*/locations/*/agent/environments/*/users/*/sessions/*/contexts/*}:context�Acontext,update_mask�
DeleteContext0.google.cloud.dialogflow.v2.DeleteContextRequest.google.protobuf.Empty"�����*1/v2/{name=projects/*/agent/sessions/*/contexts/*}ZJ*H/v2/{name=projects/*/agent/environments/*/users/*/sessions/*/contexts/*}Z?*=/v2/{name=projects/*/locations/*/agent/sessions/*/contexts/*}ZV*T/v2/{name=projects/*/locations/*/agent/environments/*/users/*/sessions/*/contexts/*}�Aname�
DeleteAllContexts4.google.cloud.dialogflow.v2.DeleteAllContextsRequest.google.protobuf.Empty"�����*1/v2/{parent=projects/*/agent/sessions/*}/contextsZJ*H/v2/{parent=projects/*/agent/environments/*/users/*/sessions/*}/contextsZ?*=/v2/{parent=projects/*/locations/*/agent/sessions/*}/contextsZV*T/v2/{parent=projects/*/locations/*/agent/environments/*/users/*/sessions/*}/contexts�Aparentx�Adialogflow.googleapis.com�AYhttps://www.googleapis.com/auth/cloud-platform,https://www.googleapis.com/auth/dialogflowB�
com.google.cloud.dialogflow.v2BContextProtoPZDgoogle.golang.org/genproto/googleapis/cloud/dialogflow/v2;dialogflow��DF�Google.Cloud.Dialogflow.V2bproto3'
        , true);

        static::$is_initialized = true;
    }
}

