<?php
// This file was auto-generated from sdk-root/src/data/payment-cryptography-data/2022-02-03/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2022-02-03', 'endpointPrefix' => 'dataplane.payment-cryptography', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'Payment Cryptography Data Plane', 'serviceId' => 'Payment Cryptography Data', 'signatureVersion' => 'v4', 'signingName' => 'payment-cryptography', 'uid' => 'payment-cryptography-data-2022-02-03', ], 'operations' => [ 'DecryptData' => [ 'name' => 'DecryptData', 'http' => [ 'method' => 'POST', 'requestUri' => '/keys/{KeyIdentifier}/decrypt', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DecryptDataInput', ], 'output' => [ 'shape' => 'DecryptDataOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'EncryptData' => [ 'name' => 'EncryptData', 'http' => [ 'method' => 'POST', 'requestUri' => '/keys/{KeyIdentifier}/encrypt', 'responseCode' => 200, ], 'input' => [ 'shape' => 'EncryptDataInput', ], 'output' => [ 'shape' => 'EncryptDataOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'GenerateCardValidationData' => [ 'name' => 'GenerateCardValidationData', 'http' => [ 'method' => 'POST', 'requestUri' => '/cardvalidationdata/generate', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GenerateCardValidationDataInput', ], 'output' => [ 'shape' => 'GenerateCardValidationDataOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'GenerateMac' => [ 'name' => 'GenerateMac', 'http' => [ 'method' => 'POST', 'requestUri' => '/mac/generate', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GenerateMacInput', ], 'output' => [ 'shape' => 'GenerateMacOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'GeneratePinData' => [ 'name' => 'GeneratePinData', 'http' => [ 'method' => 'POST', 'requestUri' => '/pindata/generate', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GeneratePinDataInput', ], 'output' => [ 'shape' => 'GeneratePinDataOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ReEncryptData' => [ 'name' => 'ReEncryptData', 'http' => [ 'method' => 'POST', 'requestUri' => '/keys/{IncomingKeyIdentifier}/reencrypt', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ReEncryptDataInput', ], 'output' => [ 'shape' => 'ReEncryptDataOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'TranslatePinData' => [ 'name' => 'TranslatePinData', 'http' => [ 'method' => 'POST', 'requestUri' => '/pindata/translate', 'responseCode' => 200, ], 'input' => [ 'shape' => 'TranslatePinDataInput', ], 'output' => [ 'shape' => 'TranslatePinDataOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'VerifyAuthRequestCryptogram' => [ 'name' => 'VerifyAuthRequestCryptogram', 'http' => [ 'method' => 'POST', 'requestUri' => '/cryptogram/verify', 'responseCode' => 200, ], 'input' => [ 'shape' => 'VerifyAuthRequestCryptogramInput', ], 'output' => [ 'shape' => 'VerifyAuthRequestCryptogramOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'VerificationFailedException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'VerifyCardValidationData' => [ 'name' => 'VerifyCardValidationData', 'http' => [ 'method' => 'POST', 'requestUri' => '/cardvalidationdata/verify', 'responseCode' => 200, ], 'input' => [ 'shape' => 'VerifyCardValidationDataInput', ], 'output' => [ 'shape' => 'VerifyCardValidationDataOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'VerificationFailedException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'VerifyMac' => [ 'name' => 'VerifyMac', 'http' => [ 'method' => 'POST', 'requestUri' => '/mac/verify', 'responseCode' => 200, ], 'input' => [ 'shape' => 'VerifyMacInput', ], 'output' => [ 'shape' => 'VerifyMacOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'VerificationFailedException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'VerifyPinData' => [ 'name' => 'VerifyPinData', 'http' => [ 'method' => 'POST', 'requestUri' => '/pindata/verify', 'responseCode' => 200, ], 'input' => [ 'shape' => 'VerifyPinDataInput', ], 'output' => [ 'shape' => 'VerifyPinDataOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'VerificationFailedException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 403, 'senderFault' => true, ], 'exception' => true, ], 'AmexCardSecurityCodeVersion1' => [ 'type' => 'structure', 'required' => [ 'CardExpiryDate', ], 'members' => [ 'CardExpiryDate' => [ 'shape' => 'NumberLengthEquals4', ], ], ], 'AmexCardSecurityCodeVersion2' => [ 'type' => 'structure', 'required' => [ 'CardExpiryDate', 'ServiceCode', ], 'members' => [ 'CardExpiryDate' => [ 'shape' => 'NumberLengthEquals4', ], 'ServiceCode' => [ 'shape' => 'NumberLengthEquals3', ], ], ], 'AsymmetricEncryptionAttributes' => [ 'type' => 'structure', 'members' => [ 'PaddingType' => [ 'shape' => 'PaddingType', ], ], ], 'CardGenerationAttributes' => [ 'type' => 'structure', 'members' => [ 'AmexCardSecurityCodeVersion1' => [ 'shape' => 'AmexCardSecurityCodeVersion1', ], 'AmexCardSecurityCodeVersion2' => [ 'shape' => 'AmexCardSecurityCodeVersion2', ], 'CardHolderVerificationValue' => [ 'shape' => 'CardHolderVerificationValue', ], 'CardVerificationValue1' => [ 'shape' => 'CardVerificationValue1', ], 'CardVerificationValue2' => [ 'shape' => 'CardVerificationValue2', ], 'DynamicCardVerificationCode' => [ 'shape' => 'DynamicCardVerificationCode', ], 'DynamicCardVerificationValue' => [ 'shape' => 'DynamicCardVerificationValue', ], ], 'union' => true, ], 'CardHolderVerificationValue' => [ 'type' => 'structure', 'required' => [ 'ApplicationTransactionCounter', 'PanSequenceNumber', 'UnpredictableNumber', ], 'members' => [ 'ApplicationTransactionCounter' => [ 'shape' => 'HexLengthBetween2And4', ], 'PanSequenceNumber' => [ 'shape' => 'HexLengthEquals2', ], 'UnpredictableNumber' => [ 'shape' => 'HexLengthBetween2And8', ], ], ], 'CardVerificationAttributes' => [ 'type' => 'structure', 'members' => [ 'AmexCardSecurityCodeVersion1' => [ 'shape' => 'AmexCardSecurityCodeVersion1', ], 'AmexCardSecurityCodeVersion2' => [ 'shape' => 'AmexCardSecurityCodeVersion2', ], 'CardHolderVerificationValue' => [ 'shape' => 'CardHolderVerificationValue', ], 'CardVerificationValue1' => [ 'shape' => 'CardVerificationValue1', ], 'CardVerificationValue2' => [ 'shape' => 'CardVerificationValue2', ], 'DiscoverDynamicCardVerificationCode' => [ 'shape' => 'DiscoverDynamicCardVerificationCode', ], 'DynamicCardVerificationCode' => [ 'shape' => 'DynamicCardVerificationCode', ], 'DynamicCardVerificationValue' => [ 'shape' => 'DynamicCardVerificationValue', ], ], 'union' => true, ], 'CardVerificationValue1' => [ 'type' => 'structure', 'required' => [ 'CardExpiryDate', 'ServiceCode', ], 'members' => [ 'CardExpiryDate' => [ 'shape' => 'NumberLengthEquals4', ], 'ServiceCode' => [ 'shape' => 'NumberLengthEquals3', ], ], ], 'CardVerificationValue2' => [ 'type' => 'structure', 'required' => [ 'CardExpiryDate', ], 'members' => [ 'CardExpiryDate' => [ 'shape' => 'NumberLengthEquals4', ], ], ], 'CryptogramAuthResponse' => [ 'type' => 'structure', 'members' => [ 'ArpcMethod1' => [ 'shape' => 'CryptogramVerificationArpcMethod1', ], 'ArpcMethod2' => [ 'shape' => 'CryptogramVerificationArpcMethod2', ], ], 'union' => true, ], 'CryptogramVerificationArpcMethod1' => [ 'type' => 'structure', 'required' => [ 'AuthResponseCode', ], 'members' => [ 'AuthResponseCode' => [ 'shape' => 'HexLengthEquals4', ], ], ], 'CryptogramVerificationArpcMethod2' => [ 'type' => 'structure', 'required' => [ 'CardStatusUpdate', ], 'members' => [ 'CardStatusUpdate' => [ 'shape' => 'HexLengthEquals8', ], 'ProprietaryAuthenticationData' => [ 'shape' => 'HexLengthBetween1And16', ], ], ], 'DecryptDataInput' => [ 'type' => 'structure', 'required' => [ 'CipherText', 'DecryptionAttributes', 'KeyIdentifier', ], 'members' => [ 'CipherText' => [ 'shape' => 'HexEvenLengthBetween16And4096', ], 'DecryptionAttributes' => [ 'shape' => 'EncryptionDecryptionAttributes', ], 'KeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', 'location' => 'uri', 'locationName' => 'KeyIdentifier', ], ], ], 'DecryptDataOutput' => [ 'type' => 'structure', 'required' => [ 'KeyArn', 'KeyCheckValue', 'PlainText', ], 'members' => [ 'KeyArn' => [ 'shape' => 'KeyArn', ], 'KeyCheckValue' => [ 'shape' => 'KeyCheckValue', ], 'PlainText' => [ 'shape' => 'HexEvenLengthBetween16And4096', ], ], ], 'DiscoverDynamicCardVerificationCode' => [ 'type' => 'structure', 'required' => [ 'ApplicationTransactionCounter', 'CardExpiryDate', 'UnpredictableNumber', ], 'members' => [ 'ApplicationTransactionCounter' => [ 'shape' => 'HexLengthBetween2And4', ], 'CardExpiryDate' => [ 'shape' => 'NumberLengthEquals4', ], 'UnpredictableNumber' => [ 'shape' => 'HexLengthBetween2And8', ], ], ], 'DukptAttributes' => [ 'type' => 'structure', 'required' => [ 'DukptDerivationType', 'KeySerialNumber', ], 'members' => [ 'DukptDerivationType' => [ 'shape' => 'DukptDerivationType', ], 'KeySerialNumber' => [ 'shape' => 'HexLengthBetween10And24', ], ], ], 'DukptDerivationAttributes' => [ 'type' => 'structure', 'required' => [ 'KeySerialNumber', ], 'members' => [ 'DukptKeyDerivationType' => [ 'shape' => 'DukptDerivationType', ], 'DukptKeyVariant' => [ 'shape' => 'DukptKeyVariant', ], 'KeySerialNumber' => [ 'shape' => 'HexLengthBetween10And24', ], ], ], 'DukptDerivationType' => [ 'type' => 'string', 'enum' => [ 'TDES_2KEY', 'TDES_3KEY', 'AES_128', 'AES_192', 'AES_256', ], ], 'DukptEncryptionAttributes' => [ 'type' => 'structure', 'required' => [ 'KeySerialNumber', ], 'members' => [ 'DukptKeyDerivationType' => [ 'shape' => 'DukptDerivationType', ], 'DukptKeyVariant' => [ 'shape' => 'DukptKeyVariant', ], 'InitializationVector' => [ 'shape' => 'HexLength16Or32', ], 'KeySerialNumber' => [ 'shape' => 'HexLengthBetween10And24', ], 'Mode' => [ 'shape' => 'DukptEncryptionMode', ], ], ], 'DukptEncryptionMode' => [ 'type' => 'string', 'enum' => [ 'ECB', 'CBC', ], ], 'DukptKeyVariant' => [ 'type' => 'string', 'enum' => [ 'BIDIRECTIONAL', 'REQUEST', 'RESPONSE', ], ], 'DynamicCardVerificationCode' => [ 'type' => 'structure', 'required' => [ 'ApplicationTransactionCounter', 'PanSequenceNumber', 'TrackData', 'UnpredictableNumber', ], 'members' => [ 'ApplicationTransactionCounter' => [ 'shape' => 'HexLengthBetween2And4', ], 'PanSequenceNumber' => [ 'shape' => 'HexLengthEquals2', ], 'TrackData' => [ 'shape' => 'HexLengthBetween2And160', ], 'UnpredictableNumber' => [ 'shape' => 'HexLengthBetween2And8', ], ], ], 'DynamicCardVerificationValue' => [ 'type' => 'structure', 'required' => [ 'ApplicationTransactionCounter', 'CardExpiryDate', 'PanSequenceNumber', 'ServiceCode', ], 'members' => [ 'ApplicationTransactionCounter' => [ 'shape' => 'HexLengthBetween2And4', ], 'CardExpiryDate' => [ 'shape' => 'NumberLengthEquals4', ], 'PanSequenceNumber' => [ 'shape' => 'HexLengthEquals2', ], 'ServiceCode' => [ 'shape' => 'NumberLengthEquals3', ], ], ], 'EncryptDataInput' => [ 'type' => 'structure', 'required' => [ 'EncryptionAttributes', 'KeyIdentifier', 'PlainText', ], 'members' => [ 'EncryptionAttributes' => [ 'shape' => 'EncryptionDecryptionAttributes', ], 'KeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', 'location' => 'uri', 'locationName' => 'KeyIdentifier', ], 'PlainText' => [ 'shape' => 'HexEvenLengthBetween16And4064', ], ], ], 'EncryptDataOutput' => [ 'type' => 'structure', 'required' => [ 'CipherText', 'KeyArn', ], 'members' => [ 'CipherText' => [ 'shape' => 'HexEvenLengthBetween16And4096', ], 'KeyArn' => [ 'shape' => 'KeyArn', ], 'KeyCheckValue' => [ 'shape' => 'KeyCheckValue', ], ], ], 'EncryptionDecryptionAttributes' => [ 'type' => 'structure', 'members' => [ 'Asymmetric' => [ 'shape' => 'AsymmetricEncryptionAttributes', ], 'Dukpt' => [ 'shape' => 'DukptEncryptionAttributes', ], 'Symmetric' => [ 'shape' => 'SymmetricEncryptionAttributes', ], ], 'union' => true, ], 'EncryptionMode' => [ 'type' => 'string', 'enum' => [ 'ECB', 'CBC', 'CFB', 'CFB1', 'CFB8', 'CFB64', 'CFB128', 'OFB', ], ], 'GenerateCardValidationDataInput' => [ 'type' => 'structure', 'required' => [ 'GenerationAttributes', 'KeyIdentifier', 'PrimaryAccountNumber', ], 'members' => [ 'GenerationAttributes' => [ 'shape' => 'CardGenerationAttributes', ], 'KeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', ], 'PrimaryAccountNumber' => [ 'shape' => 'NumberLengthBetween12And19', ], 'ValidationDataLength' => [ 'shape' => 'IntegerRangeBetween3And5Type', ], ], ], 'GenerateCardValidationDataOutput' => [ 'type' => 'structure', 'required' => [ 'KeyArn', 'KeyCheckValue', 'ValidationData', ], 'members' => [ 'KeyArn' => [ 'shape' => 'KeyArn', ], 'KeyCheckValue' => [ 'shape' => 'KeyCheckValue', ], 'ValidationData' => [ 'shape' => 'NumberLengthBetween3And5', ], ], ], 'GenerateMacInput' => [ 'type' => 'structure', 'required' => [ 'GenerationAttributes', 'KeyIdentifier', 'MessageData', ], 'members' => [ 'GenerationAttributes' => [ 'shape' => 'MacAttributes', ], 'KeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', ], 'MacLength' => [ 'shape' => 'IntegerRangeBetween4And16', ], 'MessageData' => [ 'shape' => 'HexEvenLengthBetween2And4096', ], ], ], 'GenerateMacOutput' => [ 'type' => 'structure', 'required' => [ 'KeyArn', 'KeyCheckValue', 'Mac', ], 'members' => [ 'KeyArn' => [ 'shape' => 'KeyArn', ], 'KeyCheckValue' => [ 'shape' => 'KeyCheckValue', ], 'Mac' => [ 'shape' => 'HexLengthBetween4And128', ], ], ], 'GeneratePinDataInput' => [ 'type' => 'structure', 'required' => [ 'EncryptionKeyIdentifier', 'GenerationAttributes', 'GenerationKeyIdentifier', 'PinBlockFormat', 'PrimaryAccountNumber', ], 'members' => [ 'EncryptionKeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', ], 'GenerationAttributes' => [ 'shape' => 'PinGenerationAttributes', ], 'GenerationKeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', ], 'PinBlockFormat' => [ 'shape' => 'PinBlockFormatForPinData', ], 'PinDataLength' => [ 'shape' => 'IntegerRangeBetween4And12', 'box' => true, ], 'PrimaryAccountNumber' => [ 'shape' => 'NumberLengthBetween12And19', ], ], ], 'GeneratePinDataOutput' => [ 'type' => 'structure', 'required' => [ 'EncryptedPinBlock', 'EncryptionKeyArn', 'EncryptionKeyCheckValue', 'GenerationKeyArn', 'GenerationKeyCheckValue', 'PinData', ], 'members' => [ 'EncryptedPinBlock' => [ 'shape' => 'HexLengthBetween16And32', ], 'EncryptionKeyArn' => [ 'shape' => 'KeyArn', ], 'EncryptionKeyCheckValue' => [ 'shape' => 'KeyCheckValue', ], 'GenerationKeyArn' => [ 'shape' => 'KeyArn', ], 'GenerationKeyCheckValue' => [ 'shape' => 'KeyCheckValue', ], 'PinData' => [ 'shape' => 'PinData', ], ], ], 'HexEvenLengthBetween16And32' => [ 'type' => 'string', 'max' => 32, 'min' => 16, 'pattern' => '^(?:[0-9a-fA-F][0-9a-fA-F])+$', 'sensitive' => true, ], 'HexEvenLengthBetween16And4064' => [ 'type' => 'string', 'max' => 4064, 'min' => 16, 'pattern' => '^(?:[0-9a-fA-F][0-9a-fA-F])+$', 'sensitive' => true, ], 'HexEvenLengthBetween16And4096' => [ 'type' => 'string', 'max' => 4096, 'min' => 16, 'pattern' => '^(?:[0-9a-fA-F][0-9a-fA-F])+$', 'sensitive' => true, ], 'HexEvenLengthBetween2And4096' => [ 'type' => 'string', 'max' => 4096, 'min' => 2, 'pattern' => '^(?:[0-9a-fA-F][0-9a-fA-F])+$', 'sensitive' => true, ], 'HexEvenLengthBetween4And128' => [ 'type' => 'string', 'max' => 128, 'min' => 4, 'pattern' => '^(?:[0-9a-fA-F][0-9a-fA-F])+$', 'sensitive' => true, ], 'HexLength16Or32' => [ 'type' => 'string', 'max' => 32, 'min' => 16, 'pattern' => '^(?:[0-9a-fA-F]{16}|[0-9a-fA-F]{32})$', 'sensitive' => true, ], 'HexLengthBetween10And24' => [ 'type' => 'string', 'max' => 24, 'min' => 10, 'pattern' => '^[0-9a-fA-F]+$', ], 'HexLengthBetween16And32' => [ 'type' => 'string', 'max' => 32, 'min' => 16, 'pattern' => '^[0-9a-fA-F]+$', ], 'HexLengthBetween1And16' => [ 'type' => 'string', 'max' => 16, 'min' => 1, 'pattern' => '^[0-9a-fA-F]+$', ], 'HexLengthBetween2And1024' => [ 'type' => 'string', 'max' => 1024, 'min' => 2, 'pattern' => '^[0-9a-fA-F]+$', ], 'HexLengthBetween2And160' => [ 'type' => 'string', 'max' => 160, 'min' => 2, 'pattern' => '^[0-9a-fA-F]+$', ], 'HexLengthBetween2And4' => [ 'type' => 'string', 'max' => 4, 'min' => 2, 'pattern' => '^[0-9a-fA-F]+$', ], 'HexLengthBetween2And8' => [ 'type' => 'string', 'max' => 8, 'min' => 2, 'pattern' => '^[0-9a-fA-F]+$', ], 'HexLengthBetween4And128' => [ 'type' => 'string', 'max' => 128, 'min' => 4, 'pattern' => '^[0-9a-fA-F]+$', ], 'HexLengthEquals1' => [ 'type' => 'string', 'max' => 1, 'min' => 1, 'pattern' => '^[0-9A-F]+$', ], 'HexLengthEquals16' => [ 'type' => 'string', 'max' => 16, 'min' => 16, 'pattern' => '^[0-9a-fA-F]+$', ], 'HexLengthEquals2' => [ 'type' => 'string', 'max' => 2, 'min' => 2, 'pattern' => '^[0-9a-fA-F]+$', ], 'HexLengthEquals4' => [ 'type' => 'string', 'max' => 4, 'min' => 4, 'pattern' => '^[0-9a-fA-F]+$', ], 'HexLengthEquals8' => [ 'type' => 'string', 'max' => 8, 'min' => 8, 'pattern' => '^[0-9a-fA-F]+$', ], 'Ibm3624NaturalPin' => [ 'type' => 'structure', 'required' => [ 'DecimalizationTable', 'PinValidationData', 'PinValidationDataPadCharacter', ], 'members' => [ 'DecimalizationTable' => [ 'shape' => 'NumberLengthEquals16', ], 'PinValidationData' => [ 'shape' => 'NumberLengthBetween4And16', ], 'PinValidationDataPadCharacter' => [ 'shape' => 'HexLengthEquals1', ], ], ], 'Ibm3624PinFromOffset' => [ 'type' => 'structure', 'required' => [ 'DecimalizationTable', 'PinOffset', 'PinValidationData', 'PinValidationDataPadCharacter', ], 'members' => [ 'DecimalizationTable' => [ 'shape' => 'NumberLengthEquals16', ], 'PinOffset' => [ 'shape' => 'NumberLengthBetween4And12', ], 'PinValidationData' => [ 'shape' => 'NumberLengthBetween4And16', ], 'PinValidationDataPadCharacter' => [ 'shape' => 'HexLengthEquals1', ], ], ], 'Ibm3624PinOffset' => [ 'type' => 'structure', 'required' => [ 'DecimalizationTable', 'EncryptedPinBlock', 'PinValidationData', 'PinValidationDataPadCharacter', ], 'members' => [ 'DecimalizationTable' => [ 'shape' => 'NumberLengthEquals16', ], 'EncryptedPinBlock' => [ 'shape' => 'HexLengthBetween16And32', ], 'PinValidationData' => [ 'shape' => 'NumberLengthBetween4And16', ], 'PinValidationDataPadCharacter' => [ 'shape' => 'HexLengthEquals1', ], ], ], 'Ibm3624PinVerification' => [ 'type' => 'structure', 'required' => [ 'DecimalizationTable', 'PinOffset', 'PinValidationData', 'PinValidationDataPadCharacter', ], 'members' => [ 'DecimalizationTable' => [ 'shape' => 'NumberLengthEquals16', ], 'PinOffset' => [ 'shape' => 'NumberLengthBetween4And12', ], 'PinValidationData' => [ 'shape' => 'NumberLengthBetween4And16', ], 'PinValidationDataPadCharacter' => [ 'shape' => 'HexLengthEquals1', ], ], ], 'Ibm3624RandomPin' => [ 'type' => 'structure', 'required' => [ 'DecimalizationTable', 'PinValidationData', 'PinValidationDataPadCharacter', ], 'members' => [ 'DecimalizationTable' => [ 'shape' => 'NumberLengthEquals16', ], 'PinValidationData' => [ 'shape' => 'NumberLengthBetween4And16', ], 'PinValidationDataPadCharacter' => [ 'shape' => 'HexLengthEquals1', ], ], ], 'IntegerRangeBetween0And9' => [ 'type' => 'integer', 'box' => true, 'max' => 9, 'min' => 0, ], 'IntegerRangeBetween3And5Type' => [ 'type' => 'integer', 'box' => true, 'max' => 5, 'min' => 3, ], 'IntegerRangeBetween4And12' => [ 'type' => 'integer', 'max' => 12, 'min' => 4, ], 'IntegerRangeBetween4And16' => [ 'type' => 'integer', 'box' => true, 'max' => 16, 'min' => 4, ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, ], 'KeyArn' => [ 'type' => 'string', 'max' => 150, 'min' => 70, 'pattern' => '^arn:aws:payment-cryptography:[a-z]{2}-[a-z]{1,16}-[0-9]+:[0-9]{12}:key/[0-9a-zA-Z]{16,64}$', ], 'KeyArnOrKeyAliasType' => [ 'type' => 'string', 'max' => 322, 'min' => 7, 'pattern' => '^arn:aws:payment-cryptography:[a-z]{2}-[a-z]{1,16}-[0-9]+:[0-9]{12}:(key/[0-9a-zA-Z]{16,64}|alias/[a-zA-Z0-9/_-]+)$|^alias/[a-zA-Z0-9/_-]+$', ], 'KeyCheckValue' => [ 'type' => 'string', 'max' => 16, 'min' => 4, 'pattern' => '^[0-9a-fA-F]+$', ], 'MacAlgorithm' => [ 'type' => 'string', 'enum' => [ 'ISO9797_ALGORITHM1', 'ISO9797_ALGORITHM3', 'CMAC', 'HMAC_SHA224', 'HMAC_SHA256', 'HMAC_SHA384', 'HMAC_SHA512', ], ], 'MacAlgorithmDukpt' => [ 'type' => 'structure', 'required' => [ 'DukptKeyVariant', 'KeySerialNumber', ], 'members' => [ 'DukptDerivationType' => [ 'shape' => 'DukptDerivationType', ], 'DukptKeyVariant' => [ 'shape' => 'DukptKeyVariant', ], 'KeySerialNumber' => [ 'shape' => 'HexLengthBetween10And24', ], ], ], 'MacAlgorithmEmv' => [ 'type' => 'structure', 'required' => [ 'MajorKeyDerivationMode', 'PanSequenceNumber', 'PrimaryAccountNumber', 'SessionKeyDerivationMode', 'SessionKeyDerivationValue', ], 'members' => [ 'MajorKeyDerivationMode' => [ 'shape' => 'MajorKeyDerivationMode', ], 'PanSequenceNumber' => [ 'shape' => 'HexLengthEquals2', ], 'PrimaryAccountNumber' => [ 'shape' => 'NumberLengthBetween12And19', ], 'SessionKeyDerivationMode' => [ 'shape' => 'SessionKeyDerivationMode', ], 'SessionKeyDerivationValue' => [ 'shape' => 'SessionKeyDerivationValue', ], ], ], 'MacAttributes' => [ 'type' => 'structure', 'members' => [ 'Algorithm' => [ 'shape' => 'MacAlgorithm', ], 'DukptCmac' => [ 'shape' => 'MacAlgorithmDukpt', ], 'DukptIso9797Algorithm1' => [ 'shape' => 'MacAlgorithmDukpt', ], 'DukptIso9797Algorithm3' => [ 'shape' => 'MacAlgorithmDukpt', ], 'EmvMac' => [ 'shape' => 'MacAlgorithmEmv', ], ], 'union' => true, ], 'MajorKeyDerivationMode' => [ 'type' => 'string', 'enum' => [ 'EMV_OPTION_A', 'EMV_OPTION_B', ], ], 'NumberLengthBetween12And19' => [ 'type' => 'string', 'max' => 19, 'min' => 12, 'pattern' => '^[0-9]+$', 'sensitive' => true, ], 'NumberLengthBetween3And5' => [ 'type' => 'string', 'max' => 5, 'min' => 3, 'pattern' => '^[0-9]+$', ], 'NumberLengthBetween4And12' => [ 'type' => 'string', 'max' => 12, 'min' => 4, 'pattern' => '^[0-9]+$', ], 'NumberLengthBetween4And16' => [ 'type' => 'string', 'max' => 16, 'min' => 4, 'pattern' => '^[0-9]+$', ], 'NumberLengthEquals16' => [ 'type' => 'string', 'max' => 16, 'min' => 16, 'pattern' => '^[0-9]+$', ], 'NumberLengthEquals3' => [ 'type' => 'string', 'max' => 3, 'min' => 3, 'pattern' => '^[0-9]+$', ], 'NumberLengthEquals4' => [ 'type' => 'string', 'max' => 4, 'min' => 4, 'pattern' => '^[0-9]+$', ], 'PaddingType' => [ 'type' => 'string', 'enum' => [ 'PKCS1', 'OAEP_SHA1', 'OAEP_SHA256', 'OAEP_SHA512', ], ], 'PinBlockFormatForPinData' => [ 'type' => 'string', 'enum' => [ 'ISO_FORMAT_0', 'ISO_FORMAT_3', ], ], 'PinData' => [ 'type' => 'structure', 'members' => [ 'PinOffset' => [ 'shape' => 'NumberLengthBetween4And12', ], 'VerificationValue' => [ 'shape' => 'NumberLengthBetween4And12', ], ], 'union' => true, ], 'PinGenerationAttributes' => [ 'type' => 'structure', 'members' => [ 'Ibm3624NaturalPin' => [ 'shape' => 'Ibm3624NaturalPin', ], 'Ibm3624PinFromOffset' => [ 'shape' => 'Ibm3624PinFromOffset', ], 'Ibm3624PinOffset' => [ 'shape' => 'Ibm3624PinOffset', ], 'Ibm3624RandomPin' => [ 'shape' => 'Ibm3624RandomPin', ], 'VisaPin' => [ 'shape' => 'VisaPin', ], 'VisaPinVerificationValue' => [ 'shape' => 'VisaPinVerificationValue', ], ], 'union' => true, ], 'PinVerificationAttributes' => [ 'type' => 'structure', 'members' => [ 'Ibm3624Pin' => [ 'shape' => 'Ibm3624PinVerification', ], 'VisaPin' => [ 'shape' => 'VisaPinVerification', ], ], 'union' => true, ], 'ReEncryptDataInput' => [ 'type' => 'structure', 'required' => [ 'CipherText', 'IncomingEncryptionAttributes', 'IncomingKeyIdentifier', 'OutgoingEncryptionAttributes', 'OutgoingKeyIdentifier', ], 'members' => [ 'CipherText' => [ 'shape' => 'HexEvenLengthBetween16And4096', ], 'IncomingEncryptionAttributes' => [ 'shape' => 'ReEncryptionAttributes', ], 'IncomingKeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', 'location' => 'uri', 'locationName' => 'IncomingKeyIdentifier', ], 'OutgoingEncryptionAttributes' => [ 'shape' => 'ReEncryptionAttributes', ], 'OutgoingKeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', ], ], ], 'ReEncryptDataOutput' => [ 'type' => 'structure', 'required' => [ 'CipherText', 'KeyArn', 'KeyCheckValue', ], 'members' => [ 'CipherText' => [ 'shape' => 'HexEvenLengthBetween16And4096', ], 'KeyArn' => [ 'shape' => 'KeyArn', ], 'KeyCheckValue' => [ 'shape' => 'KeyCheckValue', ], ], ], 'ReEncryptionAttributes' => [ 'type' => 'structure', 'members' => [ 'Dukpt' => [ 'shape' => 'DukptEncryptionAttributes', ], 'Symmetric' => [ 'shape' => 'SymmetricEncryptionAttributes', ], ], 'union' => true, ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'ResourceId' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'SessionKeyAmex' => [ 'type' => 'structure', 'required' => [ 'PanSequenceNumber', 'PrimaryAccountNumber', ], 'members' => [ 'PanSequenceNumber' => [ 'shape' => 'HexLengthEquals2', ], 'PrimaryAccountNumber' => [ 'shape' => 'NumberLengthBetween12And19', ], ], ], 'SessionKeyDerivation' => [ 'type' => 'structure', 'members' => [ 'Amex' => [ 'shape' => 'SessionKeyAmex', ], 'Emv2000' => [ 'shape' => 'SessionKeyEmv2000', ], 'EmvCommon' => [ 'shape' => 'SessionKeyEmvCommon', ], 'Mastercard' => [ 'shape' => 'SessionKeyMastercard', ], 'Visa' => [ 'shape' => 'SessionKeyVisa', ], ], 'union' => true, ], 'SessionKeyDerivationMode' => [ 'type' => 'string', 'enum' => [ 'EMV_COMMON_SESSION_KEY', 'EMV2000', 'AMEX', 'MASTERCARD_SESSION_KEY', 'VISA', ], ], 'SessionKeyDerivationValue' => [ 'type' => 'structure', 'members' => [ 'ApplicationCryptogram' => [ 'shape' => 'HexLengthEquals16', ], 'ApplicationTransactionCounter' => [ 'shape' => 'HexLengthBetween2And4', ], ], 'union' => true, ], 'SessionKeyEmv2000' => [ 'type' => 'structure', 'required' => [ 'ApplicationTransactionCounter', 'PanSequenceNumber', 'PrimaryAccountNumber', ], 'members' => [ 'ApplicationTransactionCounter' => [ 'shape' => 'HexLengthBetween2And4', ], 'PanSequenceNumber' => [ 'shape' => 'HexLengthEquals2', ], 'PrimaryAccountNumber' => [ 'shape' => 'NumberLengthBetween12And19', ], ], ], 'SessionKeyEmvCommon' => [ 'type' => 'structure', 'required' => [ 'ApplicationTransactionCounter', 'PanSequenceNumber', 'PrimaryAccountNumber', ], 'members' => [ 'ApplicationTransactionCounter' => [ 'shape' => 'HexLengthBetween2And4', ], 'PanSequenceNumber' => [ 'shape' => 'HexLengthEquals2', ], 'PrimaryAccountNumber' => [ 'shape' => 'NumberLengthBetween12And19', ], ], ], 'SessionKeyMastercard' => [ 'type' => 'structure', 'required' => [ 'ApplicationTransactionCounter', 'PanSequenceNumber', 'PrimaryAccountNumber', 'UnpredictableNumber', ], 'members' => [ 'ApplicationTransactionCounter' => [ 'shape' => 'HexLengthBetween2And4', ], 'PanSequenceNumber' => [ 'shape' => 'HexLengthEquals2', ], 'PrimaryAccountNumber' => [ 'shape' => 'NumberLengthBetween12And19', ], 'UnpredictableNumber' => [ 'shape' => 'HexLengthBetween2And8', ], ], ], 'SessionKeyVisa' => [ 'type' => 'structure', 'required' => [ 'PanSequenceNumber', 'PrimaryAccountNumber', ], 'members' => [ 'PanSequenceNumber' => [ 'shape' => 'HexLengthEquals2', ], 'PrimaryAccountNumber' => [ 'shape' => 'NumberLengthBetween12And19', ], ], ], 'String' => [ 'type' => 'string', ], 'SymmetricEncryptionAttributes' => [ 'type' => 'structure', 'required' => [ 'Mode', ], 'members' => [ 'InitializationVector' => [ 'shape' => 'HexLength16Or32', ], 'Mode' => [ 'shape' => 'EncryptionMode', ], 'PaddingType' => [ 'shape' => 'PaddingType', ], ], ], 'ThrottlingException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 429, 'senderFault' => true, ], 'exception' => true, ], 'TranslatePinDataInput' => [ 'type' => 'structure', 'required' => [ 'EncryptedPinBlock', 'IncomingKeyIdentifier', 'IncomingTranslationAttributes', 'OutgoingKeyIdentifier', 'OutgoingTranslationAttributes', ], 'members' => [ 'EncryptedPinBlock' => [ 'shape' => 'HexEvenLengthBetween16And32', ], 'IncomingDukptAttributes' => [ 'shape' => 'DukptDerivationAttributes', ], 'IncomingKeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', ], 'IncomingTranslationAttributes' => [ 'shape' => 'TranslationIsoFormats', ], 'OutgoingDukptAttributes' => [ 'shape' => 'DukptDerivationAttributes', ], 'OutgoingKeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', ], 'OutgoingTranslationAttributes' => [ 'shape' => 'TranslationIsoFormats', ], ], ], 'TranslatePinDataOutput' => [ 'type' => 'structure', 'required' => [ 'KeyArn', 'KeyCheckValue', 'PinBlock', ], 'members' => [ 'KeyArn' => [ 'shape' => 'KeyArn', ], 'KeyCheckValue' => [ 'shape' => 'KeyCheckValue', ], 'PinBlock' => [ 'shape' => 'HexLengthBetween16And32', ], ], ], 'TranslationIsoFormats' => [ 'type' => 'structure', 'members' => [ 'IsoFormat0' => [ 'shape' => 'TranslationPinDataIsoFormat034', ], 'IsoFormat1' => [ 'shape' => 'TranslationPinDataIsoFormat1', ], 'IsoFormat3' => [ 'shape' => 'TranslationPinDataIsoFormat034', ], 'IsoFormat4' => [ 'shape' => 'TranslationPinDataIsoFormat034', ], ], 'union' => true, ], 'TranslationPinDataIsoFormat034' => [ 'type' => 'structure', 'required' => [ 'PrimaryAccountNumber', ], 'members' => [ 'PrimaryAccountNumber' => [ 'shape' => 'NumberLengthBetween12And19', ], ], ], 'TranslationPinDataIsoFormat1' => [ 'type' => 'structure', 'members' => [], ], 'ValidationException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'fieldList' => [ 'shape' => 'ValidationExceptionFieldList', ], 'message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'ValidationExceptionField' => [ 'type' => 'structure', 'required' => [ 'message', 'path', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'path' => [ 'shape' => 'String', ], ], ], 'ValidationExceptionFieldList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ValidationExceptionField', ], ], 'VerificationFailedException' => [ 'type' => 'structure', 'required' => [ 'Message', 'Reason', ], 'members' => [ 'Message' => [ 'shape' => 'String', ], 'Reason' => [ 'shape' => 'VerificationFailedReason', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'VerificationFailedReason' => [ 'type' => 'string', 'enum' => [ 'INVALID_MAC', 'INVALID_PIN', 'INVALID_VALIDATION_DATA', 'INVALID_AUTH_REQUEST_CRYPTOGRAM', ], ], 'VerifyAuthRequestCryptogramInput' => [ 'type' => 'structure', 'required' => [ 'AuthRequestCryptogram', 'KeyIdentifier', 'MajorKeyDerivationMode', 'SessionKeyDerivationAttributes', 'TransactionData', ], 'members' => [ 'AuthRequestCryptogram' => [ 'shape' => 'HexLengthEquals16', ], 'AuthResponseAttributes' => [ 'shape' => 'CryptogramAuthResponse', ], 'KeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', ], 'MajorKeyDerivationMode' => [ 'shape' => 'MajorKeyDerivationMode', ], 'SessionKeyDerivationAttributes' => [ 'shape' => 'SessionKeyDerivation', ], 'TransactionData' => [ 'shape' => 'HexLengthBetween2And1024', ], ], ], 'VerifyAuthRequestCryptogramOutput' => [ 'type' => 'structure', 'required' => [ 'KeyArn', 'KeyCheckValue', ], 'members' => [ 'AuthResponseValue' => [ 'shape' => 'HexLengthBetween1And16', ], 'KeyArn' => [ 'shape' => 'KeyArn', ], 'KeyCheckValue' => [ 'shape' => 'KeyCheckValue', ], ], ], 'VerifyCardValidationDataInput' => [ 'type' => 'structure', 'required' => [ 'KeyIdentifier', 'PrimaryAccountNumber', 'ValidationData', 'VerificationAttributes', ], 'members' => [ 'KeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', ], 'PrimaryAccountNumber' => [ 'shape' => 'NumberLengthBetween12And19', ], 'ValidationData' => [ 'shape' => 'NumberLengthBetween3And5', ], 'VerificationAttributes' => [ 'shape' => 'CardVerificationAttributes', ], ], ], 'VerifyCardValidationDataOutput' => [ 'type' => 'structure', 'required' => [ 'KeyArn', 'KeyCheckValue', ], 'members' => [ 'KeyArn' => [ 'shape' => 'KeyArn', ], 'KeyCheckValue' => [ 'shape' => 'KeyCheckValue', ], ], ], 'VerifyMacInput' => [ 'type' => 'structure', 'required' => [ 'KeyIdentifier', 'Mac', 'MessageData', 'VerificationAttributes', ], 'members' => [ 'KeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', ], 'Mac' => [ 'shape' => 'HexEvenLengthBetween4And128', ], 'MacLength' => [ 'shape' => 'IntegerRangeBetween4And16', ], 'MessageData' => [ 'shape' => 'HexEvenLengthBetween2And4096', ], 'VerificationAttributes' => [ 'shape' => 'MacAttributes', ], ], ], 'VerifyMacOutput' => [ 'type' => 'structure', 'required' => [ 'KeyArn', 'KeyCheckValue', ], 'members' => [ 'KeyArn' => [ 'shape' => 'KeyArn', ], 'KeyCheckValue' => [ 'shape' => 'KeyCheckValue', ], ], ], 'VerifyPinDataInput' => [ 'type' => 'structure', 'required' => [ 'EncryptedPinBlock', 'EncryptionKeyIdentifier', 'PinBlockFormat', 'PrimaryAccountNumber', 'VerificationAttributes', 'VerificationKeyIdentifier', ], 'members' => [ 'DukptAttributes' => [ 'shape' => 'DukptAttributes', ], 'EncryptedPinBlock' => [ 'shape' => 'HexLengthBetween16And32', ], 'EncryptionKeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', ], 'PinBlockFormat' => [ 'shape' => 'PinBlockFormatForPinData', ], 'PinDataLength' => [ 'shape' => 'IntegerRangeBetween4And12', 'box' => true, ], 'PrimaryAccountNumber' => [ 'shape' => 'NumberLengthBetween12And19', ], 'VerificationAttributes' => [ 'shape' => 'PinVerificationAttributes', ], 'VerificationKeyIdentifier' => [ 'shape' => 'KeyArnOrKeyAliasType', ], ], ], 'VerifyPinDataOutput' => [ 'type' => 'structure', 'required' => [ 'EncryptionKeyArn', 'EncryptionKeyCheckValue', 'VerificationKeyArn', 'VerificationKeyCheckValue', ], 'members' => [ 'EncryptionKeyArn' => [ 'shape' => 'KeyArn', ], 'EncryptionKeyCheckValue' => [ 'shape' => 'KeyCheckValue', ], 'VerificationKeyArn' => [ 'shape' => 'KeyArn', ], 'VerificationKeyCheckValue' => [ 'shape' => 'KeyCheckValue', ], ], ], 'VisaPin' => [ 'type' => 'structure', 'required' => [ 'PinVerificationKeyIndex', ], 'members' => [ 'PinVerificationKeyIndex' => [ 'shape' => 'IntegerRangeBetween0And9', ], ], ], 'VisaPinVerification' => [ 'type' => 'structure', 'required' => [ 'PinVerificationKeyIndex', 'VerificationValue', ], 'members' => [ 'PinVerificationKeyIndex' => [ 'shape' => 'IntegerRangeBetween0And9', ], 'VerificationValue' => [ 'shape' => 'NumberLengthBetween4And12', ], ], ], 'VisaPinVerificationValue' => [ 'type' => 'structure', 'required' => [ 'EncryptedPinBlock', 'PinVerificationKeyIndex', ], 'members' => [ 'EncryptedPinBlock' => [ 'shape' => 'HexLengthBetween16And32', ], 'PinVerificationKeyIndex' => [ 'shape' => 'IntegerRangeBetween0And9', ], ], ], ],];
