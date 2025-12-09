<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Parsers;

use Architecture\XmlSchemator\Parents\Models\Model;
use Sabre\Xml\Reader as SabreReader;

class Reader extends SabreReader
{
    /**
     * Parses all elements below the current element.
     *
     * This method will return a string if this was a text-node, or an array if
     * there were sub-elements.
     *
     * If there's both text and sub-elements, the text will be discarded.
     *
     * If the $elementMap argument is specified, the existing elementMap will
     * be overridden while parsing the tree, and restored after this process.
     *
     * @return array|string|null
     */
    public function parseInnerTree(array $elementMap = null, Model $parentEntity = null)
    {
        $text = null;
        $elements = [];

        if (self::ELEMENT === $this->nodeType && $this->isEmptyElement) {
            // Easy!
            $this->next();

            return null;
        }

        if (!is_null($elementMap)) {
            $this->pushContext();
            $this->elementMap = $elementMap;
        }

        try {
            if (!$this->read()) {
                $errors = libxml_get_errors();
                libxml_clear_errors();
                if ($errors) {
                    throw new LibXMLException($errors);
                }
                throw new ParseException('This should never happen (famous last words)');
            }

            $keepOnParsing = true;

            while ($keepOnParsing) {
                if (!$this->isValid()) {
                    $errors = libxml_get_errors();

                    if ($errors) {
                        libxml_clear_errors();
                        throw new LibXMLException($errors);
                    }
                }

                switch ($this->nodeType) {
                    case self::ELEMENT:
                        $elements[] = $this->parseCurrentElement($parentEntity);
                        break;
                    case self::TEXT:
                    case self::CDATA:
                        $text .= $this->value;
                        $this->read();
                        break;
                    case self::END_ELEMENT:
                        // Ensuring we are moving the cursor after the end element.
                        $this->read();
                        $keepOnParsing = false;
                        break;
                    case self::NONE:
                        throw new ParseException('We hit the end of the document prematurely. This likely means that some parser "eats" too many elements. Do not attempt to continue parsing.');
                    default:
                        // Advance to the next element
                        $this->read();
                        break;
                }
            }
        } finally {
            if (!is_null($elementMap)) {
                $this->popContext();
            }
        }

        return $elements ? $elements : $text;
    }

    /**
     * Parses the current XML element.
     *
     * This method returns arn array with 3 properties:
     *   * name - A clark-notation XML element name.
     *   * value - The parsed value.
     *   * attributes - A key-value list of attributes.
     */
    public function parseCurrentElement(Model $parentEntity = null): array
    {
        $name = $this->getClark();

        $attributes = [];

        if ($this->hasAttributes) {
            $attributes = $this->parseAttributes();
        }

        $value = call_user_func(
            $this->getDeserializerForElementName((string) $name),
            $this,
            $parentEntity
        );

        return [
            'name' => $name,
            'value' => $value,
            'attributes' => $attributes,
        ];
    }

    /**
     * Grabs all the attributes from the current element, and returns them as a
     * key-value array.
     *
     * If the attributes are part of the same namespace, they will simply be
     * short keys. If they are defined on a different namespace, the attribute
     * name will be returned in clark-notation.
     */
    public function parseAttributes(): array
    {
        $attributes = [];

        while ($this->moveToNextAttribute()) {
            if ($this->namespaceURI) {
                // Ignoring 'xmlns', it doesn't make any sense.
                // if ('http://www.w3.org/2000/xmlns/' === $this->namespaceURI) {
                //     continue;
                // }

                $name = $this->getClark();
                $attributes[$name] = $this->value;
            } else {
                $attributes[$this->localName] = $this->value;
            }
        }
        $this->moveToElement();

        return $attributes;
    }
}
