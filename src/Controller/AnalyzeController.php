<?php

namespace App\Controller;

use App\Utility\NestedArray;
use DOMDocument;
use DOMNode;
use DOMNodeList;
use DOMXPath;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnalyzeController extends AbstractSerializerController
{

    /**
     * @Route("/analysis", name="analysis_results_list")
     */
    final public function list(): Response
    {
        $sources = $elements = $characters = [];

        $this->analyse('index', 'index', '/index', $sources);
        $this->analyse('index', 'xml', '/elements', $elements);
        $this->analyse('characters', 'dnd5e', '/character', $characters);

        return $this->renderPlaceholder($sources, $elements, $characters);
    }

    private function analyse(string $dir, string $fileExtension, string $expression, array &$results): void
    {
        $files = $this->getFiles($dir, $fileExtension);
        foreach ($files as $content) {
            $document = new DOMDocument();
            $document->loadXML($content);
            $xpath = new DOMXPath($document);
            /** @var DOMNodeList $nodeList */
            $nodeList = $xpath->query($expression);
            /** @var DOMNode $node */
            foreach ($nodeList as $node) {
                $this->fillNodeData($node, [], $results);
            }
        }
    }

    private function fillNodeData(DOMNode $node, array $path, array &$data): void {
        $nodePath = array_merge($path, [$node->nodeName]);

        if ($node->hasAttributes()) {
            $nodeAttributesPath = array_merge($nodePath, ['attributes']);
            if (!NestedArray::keyExists($data, $nodeAttributesPath)) {
                NestedArray::setValue($data, $nodeAttributesPath, []);
            }

            $attributes = $node->attributes;
            foreach ($attributes as $attribute) {
                $attributePath = array_merge($nodeAttributesPath, [$attribute->nodeName]);
                if (!NestedArray::keyExists($data, $attributePath)) {
                    NestedArray::setValue($data, $attributePath, []);
                }

                $attributeValues = NestedArray::getValue($data, $attributePath);
                if (!in_array($attribute->nodeValue, $attributeValues, true)) {
                    $attributeValues[] = $attribute->nodeValue;
                    NestedArray::setValue($data, $attributePath, array_unique($attributeValues));
                }
            }
        }

        if ($node->hasChildNodes()) {
            $childNodesPath = array_merge($nodePath, ['nodes']);
            $childNodes = $node->childNodes;
            foreach ($childNodes as $childNode) {
                $this->fillNodeData($childNode, $childNodesPath, $data);
            }
        }

        $properties = [
            'author',
            'description',
            'extend',
            'name',
            'prerequisite',
            'requirements',
            'set',
            'supports',
            'item'
        ];
        if (in_array($node->nodeName, $properties, true)) {
            $valuePath = array_merge($nodePath, ['value']);
            if (!NestedArray::keyExists($data, $valuePath)) {
                NestedArray::setValue($data, $valuePath, []);
            }

            $values = NestedArray::getValue($data, $valuePath);
            $value = trim(preg_replace(['/\t+/', '/\n{2,}/'], '', $node->textContent));
            if (!empty($value) || !in_array($value, $valuePath, true)) {
                $values[] = $value;
                NestedArray::setValue($data, $valuePath, array_unique($values));
            }
        }
    }
}