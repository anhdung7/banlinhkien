<?php
 namespace MailPoetVendor; if (!defined('ABSPATH')) exit; class Swift_Mime_Headers_ParameterizedHeader extends Swift_Mime_Headers_UnstructuredHeader { const TOKEN_REGEX = '(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2E\\x30-\\x39\\x41-\\x5A\\x5E-\\x7E]+)'; private $paramEncoder; private $params = []; public function __construct($name, Swift_Mime_HeaderEncoder $encoder, Swift_Encoder $paramEncoder = null) { parent::__construct($name, $encoder); $this->paramEncoder = $paramEncoder; } public function getFieldType() { return self::TYPE_PARAMETERIZED; } public function setCharset($charset) { parent::setCharset($charset); if (isset($this->paramEncoder)) { $this->paramEncoder->charsetChanged($charset); } } public function setParameter($parameter, $value) { $this->setParameters(\array_merge($this->getParameters(), [$parameter => $value])); } public function getParameter($parameter) { $params = $this->getParameters(); return $params[$parameter] ?? null; } public function setParameters(array $parameters) { $this->clearCachedValueIf($this->params != $parameters); $this->params = $parameters; } public function getParameters() { return $this->params; } public function getFieldBody() { $body = parent::getFieldBody(); foreach ($this->params as $name => $value) { if (null !== $value) { $body .= '; ' . $this->createParameter($name, $value); } } return $body; } protected function toTokens($string = null) { $tokens = parent::toTokens(parent::getFieldBody()); foreach ($this->params as $name => $value) { if (null !== $value) { $tokens[\count($tokens) - 1] .= ';'; $tokens = \array_merge($tokens, $this->generateTokenLines(' ' . $this->createParameter($name, $value))); } } return $tokens; } private function createParameter($name, $value) { $origValue = $value; $encoded = \false; $maxValueLength = $this->getMaxLineLength() - \strlen($name . '=*N"";') - 1; $firstLineOffset = 0; if (!\preg_match('/^' . self::TOKEN_REGEX . '$/D', $value)) { if (!\preg_match('/^[\\x00-\\x08\\x0B\\x0C\\x0E-\\x7F]*$/D', $value)) { $encoded = \true; $maxValueLength = $this->getMaxLineLength() - \strlen($name . '*N*="";') - 1; $firstLineOffset = \strlen($this->getCharset() . "'" . $this->getLanguage() . "'"); } } if ($encoded || \strlen($value) > $maxValueLength) { if (isset($this->paramEncoder)) { $value = $this->paramEncoder->encodeString($origValue, $firstLineOffset, $maxValueLength, $this->getCharset()); } else { $value = $this->getTokenAsEncodedWord($origValue); $encoded = \false; } } $valueLines = isset($this->paramEncoder) ? \explode("\r\n", $value) : [$value]; if (\count($valueLines) > 1) { $paramLines = []; foreach ($valueLines as $i => $line) { $paramLines[] = $name . '*' . $i . $this->getEndOfParameterValue($line, \true, 0 == $i); } return \implode(";\r\n ", $paramLines); } else { return $name . $this->getEndOfParameterValue($valueLines[0], $encoded, \true); } } private function getEndOfParameterValue($value, $encoded = \false, $firstLine = \false) { if (!\preg_match('/^' . self::TOKEN_REGEX . '$/D', $value)) { $value = '"' . $value . '"'; } $prepend = '='; if ($encoded) { $prepend = '*='; if ($firstLine) { $prepend = '*=' . $this->getCharset() . "'" . $this->getLanguage() . "'"; } } return $prepend . $value; } } 