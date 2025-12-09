# Architecture/XmlSchemator

## Overview

The **XmlSchemator** is a powerful, specialized package designed to automate the generation of Apiato Containers and components from XML Schema Definitions (XSDs). It is specifically tailored to handle the complex and strictly structured fiscal documents required by the Mexican Tax Authority (SAT), such as CFDI (Comprobante Fiscal Digital por Internet) and Nomina.

Instead of manually creating hundreds of Models, Transformers, and validation rules to match the SAT's massive XSD specifications, XmlSchemator parses these schemas and **auto-generates** the entire PHP codebase required to work with them.

## Core Architecture

The package operates on a pipeline that transforms raw XSD files into fully functional Apiato code.

### The Flow

1.  **Input**: Source XSD files (e.g., `cfdv40.xsd`) located in `src/Data/Assets`.
2.  **Parsing**: The `Reader` (extending `Sabre\Xml\Reader`) reads the XSD and converts it into an in-memory tree of `XmlNodeValue` objects.
3.  **Analysis & Traversal**: Using the **Visitor Pattern**, the package traverses this tree to understand the structure, relationships, types, and restrictions of each element.
4.  **Building**: `Builder` classes extract relevant metadata (namespaces, attributes, children) from the nodes.
5.  **Generation**: `Generator Commands` use this metadata to populate `stub` templates and write the final PHP files (Models, Transformers, Enums) to the `app/Containers/Sat` directory.

## Deep Dive: `src/Analyzers/Xml`

This directory contains the brain of the package. Here's a detailed breakdown of its components:

### 1. Values (`src/Analyzers/Xml/Values`)
This is the core abstraction layer. Every element, attribute, and complex type in the XSD is deserialized into an instance of `XmlNodeValue`.

*   **`XmlNodeValue`**: The base class for all nodes. It handles:
    *   **Deserialization**: Converts raw XML nodes into PHP objects.
    *   **Tree Navigation**: Maintains references to `parentNode` and `content` (children), allowing traversal up and down the schema tree.
    *   **Namespace Resolution**: Calculates the target PHP namespace (`getClassNamespacePath`) based on the XSD hierarchy. For example, a `Conceptos` element inside `Comprobante` will map to `App\Containers\Sat\Cfdi\Models\Comprobante\Conceptos`.

### 2. Parsers (`src/Analyzers/Xml/Parsers`)
*   **`Reader`**: A customized XML reader that extends `Sabre\Xml\Reader`. It is responsible for the initial pass of the XSD file. It handles the specific nuances of XSD parsing and hydrates the `XmlNodeValue` objects.

### 3. Visitors (`src/Analyzers/Xml/Visitors`)
The package employs the **Visitor Pattern** to process the `XmlNodeValue` tree. This allows for separating the parsing logic from the generation logic.
*   **Traversers**: Walk through the tree to identify all nodes that need to be processed.
*   **Exporters**: Extract specific data needed for generation from the visited nodes.

### 4. Builders (`src/Analyzers/Xml/Builders`)
Builders act as the bridge between the raw XSD nodes and the Generator Commands. They prepare the structured data required to generate specific Apiato components.
*   **`XsdModelsCommandBuilder`**: Prepares data for generating Eloquent Models (attributes, relationships, casts).
*   **`XsdEnumsCommandBuilder`**: Prepares data for generating Enums from XSD `xs:enumeration` restrictions.
*   **`XsdTransformersCommandBuilder`**: Prepares data for generating Fractal Transformers.

### 5. Rules (`src/Analyzers/Xml/Rules`)
This directory maps XSD restrictions to PHP validation logic.
*   **`EnumerationRule`**: Maps `xs:enumeration`.
*   **`LengthRule`**, **`MinLengthRule`**, **`MaxLengthRule`**: Map string length constraints.
*   **`PatternRule`**: Maps regex patterns (`xs:pattern`).
These rules are used to generate the validation logic inside the generated Models or Requests.

### 6. Commands (`src/Analyzers/Xml/Commands`)
These are the actual Artisan commands that execute the generation process.
*   **`ElementModelGenerator`**: Generates the Model class. It uses `ModelBuilder` to construct the class body, including:
    *   `$fillable` attributes.
    *   `$casts` for data types.
    *   Relationships (methods) to child elements.
    *   XML-specific metadata (e.g., `xml_node_name`, `xml_namespace`).
*   **`ElementTransformerGenerator`**: Generates the Transformer class to handle serialization/deserialization of the Model.

## Example: From XSD to Code

**Input (XSD Segment):**
```xml
<xs:element name="Comprobante">
    <xs:complexType>
        <xs:attribute name="Version" type="xs:string" use="required" fixed="4.0"/>
        <xs:attribute name="Total" type="tdCFDI:t_Importe" use="required"/>
    </xs:complexType>
</xs:element>
```

**Process:**
1.  **Parser**: Reads `<xs:element name="Comprobante">`. Creates an `XmlNodeValue` of type `Element`.
2.  **Visitor**: Visits this node. Identifies it as a root element that requires a Model.
3.  **Builder**:
    *   Extracts name "Comprobante".
    *   Identifies attributes "Version" and "Total".
    *   Determines "Version" is a fixed string "4.0".
    *   Determines "Total" is a custom type `t_Importe`.
4.  **Generator (`ElementModelGenerator`)**:
    *   Creates `App\Containers\Sat\Cfdi\Models\Comprobante.php`.
    *   Adds `Version` and `Total` to `$fillable`.
    *   Adds casts (e.g., `Total` might be cast to a Decimal/Money type).
    *   Generates the class file using `model.stub`.

**Output (Generated Model - Simplified):**
```php
namespace App\Containers\Sat\Cfdi\Models;

use App\Ship\Parents\Models\Model;

class Comprobante extends Model
{
    protected $fillable = [
        'Version',
        'Total',
    ];

    protected $casts = [
        'Version' => 'string',
        'Total' => 'decimal:2',
    ];
}
```

## Configuration

The mapping between XSDs and Apiato Containers is defined in `src/Configs/architecture-xmlSchemator.php`.
```php
'sections' => [
    'sat' => [
        'containers' => [
            'cfdi',   // Maps to App\Containers\Sat\Cfdi
            'nomina', // Maps to App\Containers\Sat\Nomina
        ],
    ],
],
```

## Configuration: `src/Configs/Sections/sat/*`

The configuration files in `src/Configs/Sections/sat/` play a crucial role in directing the generation process. They allow you to customize how specific XSDs are processed and how the resulting PHP classes are structured.

These files are organized by **Section** (`sat`) and **Container** (`cfdi`, `nomina`, `tfd`), mirroring the target directory structure.

### 1. Container Configuration (e.g., `sat/cfdi.php`)

This file defines the high-level settings for a specific container.

```php
// src/Configs/sections/sat/cfdi.php
return [
    'model_name'      => 'Cfdi',
    'collection_name' => 'Cfdi',
    'versions' => [
        'v33' => [
            'file_path' => 'xsd/legacy/cfdv33.xsd', // Path to the XSD file in src/Data/Assets
        ],
        'v40' => [
            'file_path' => 'xsd/cfdv40.xsd',
        ]
    ],
];
```
*   **`versions`**: Defines the different versions of the schema (e.g., CFDI 3.3 vs 4.0). Each version points to a specific XSD file. The generator will create separate namespaces for each version (e.g., `App\Containers\Sat\Cfdi\Models\V40`).

### 2. Element Customization (e.g., `sat/cfdi/complemento.php`)

You can create specific configuration files for individual elements to inject custom logic, relationships, or traits that cannot be inferred directly from the XSD.

**Example: `complemento.php`**
The `Complemento` element in CFDI is a container for other extensions (like Payroll/Nomina or Digital Stamp/TFD). The XSD defines it broadly, so we need to explicitly tell the generator how to handle its children.

```php
// src/Configs/sections/sat/cfdi/complemento.php
return [
    'namespaces' => [
        // Define namespaces to be imported in the generated class
        'App\Containers\Sat\Nomina\Models\V12' => 'NominaV12Models',
    ],
    'traits' => [
        // Add specific traits to the generated Model
        'App\Containers\Sat\Cfdi\Models\Contracts\ComplementoInterface' => 'ComplementoInterface',
    ],
    'properties' => [
        'deserializers' => [
            // Map XML namespaces to specific PHP classes for deserialization
            'http://www.sat.gob.mx/nomina12' => [
                'nomina' => 'NominaV12Models\Nomina::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            // Define Eloquent relationships
            'MongoDB\Laravel\Relations\HasOne' => [
                'nomina' => [
                    'NominaInterface::class',
                ],
            ],
        ]
    ]
];
```

**Impact on Generation:**
When the generator processes the `Complemento` element:
1.  It reads this config file.
2.  It adds `use App\Containers\Sat\Nomina\Models\V12 as NominaV12Models;` to the file header.
3.  It adds `use ComplementoInterface;` inside the class.
4.  It generates a `nomina()` method that returns a `HasOne` relationship to the Nomina model.
5.  It configures the XML deserializer to instantiate `NominaV12Models\Nomina` when it encounters a `nomina` element within the `http://www.sat.gob.mx/nomina12` namespace.

### Summary of Roles

*   **`architecture-xmlSchemator.php`**: Global settings (paths, enabled generators).
*   **`sections/sat/<container>.php`**: Maps XSD files to Container versions.
*   **`sections/sat/<container>/<element>.php`**: Micro-configuration for specific elements, allowing you to "patch" the generated code with custom PHP logic (traits, relationships) that exists outside the XML definition.

## Naming Conventions

The XmlSchemator package adheres to strict naming conventions to ensure consistency between the source XSDs, the package code, and the generated Apiato components.

### Package Codebase (`packages/Architecture/XmlSchemator`)

*   **Classes**: `PascalCase`.
    *   **Generators**: Suffix with `Generator` (e.g., `ElementModelGenerator`).
    *   **Builders**: Suffix with `Builder` (e.g., `ModelBuilder`, `NamespaceBuilder`).
    *   **Values**: Suffix with `Value` (e.g., `XmlNodeValue`).
*   **Methods**: `camelCase` (e.g., `getFullyQualifiedClassName`, `formatRelationshipsCode`).
*   **Constants**: `SCREAMING_SNAKE_CASE` (e.g., `SHORT_INDENT`, `STUB_PATH`).
*   **Properties**: `camelCase` (e.g., `$fillable`, `$casts`).

### Generated Code (`app/Containers/Sat/*`)

The generated code follows a specific structure to map XML elements to PHP classes while respecting Apiato's container architecture.

#### 1. Namespaces & Directory Structure
The namespace structure mirrors the XML hierarchy but is adapted for PHP PSR-4 compliance.

`App\Containers\{Section}\{Container}\{Type}\{Version}\{Path}\{Class}`

*   **Section**: Always `Sat` (StudlyCase).
*   **Container**: `Cfdi`, `Nomina`, `Tfd` (StudlyCase).
*   **Type**: `Models`, `Transformers`, `Enums`.
*   **Version**: `V` + Version Number (e.g., `V33`, `V40`, `V12`).
*   **Path**: Nested directories mirroring the XML element hierarchy (e.g., `Comprobante\Conceptos`).
*   **Class**: StudlyCase name of the XML element.

**Example:**
*   **XML**: `<cfdi:Concepto>` inside `<cfdi:Conceptos>` inside `<cfdi:Comprobante>` (Version 4.0).
*   **PHP Class**: `App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto`.

#### 2. Models
*   **Class Name**: `StudlyCase` version of the XML element name (e.g., `Comprobante`).
*   **File Name**: Same as class name (e.g., `Comprobante.php`).
*   **Attributes (`$fillable`)**: Keep the **Original Case** from the XML (e.g., `Version`, `Total`, `Fecha`). This ensures direct mapping during serialization/deserialization.
*   **Relationships**: `camelCase`.
    *   Example: A child element `<Emisor>` becomes a method `public function emisor()`.
*   **Database Collection**: `snake_case` combination of section, container, and version (e.g., `sat_cfdi_v40`).
*   **Resource Key**: `snake_case` version of the model name (e.g., `comprobante`).

#### 3. Transformers
*   **Class Name**: Model Name + `Transformer` (e.g., `ComprobanteTransformer`).
*   **Methods**: `transform` method returns an array with keys matching the Original XML attribute names.

#### 4. Enums
*   **Class Name**: `StudlyCase` name derived from the XSD simpleType name.
*   **Cases**: `PascalCase` or `SCREAMING_SNAKE_CASE` depending on the generator configuration, mapping to the XSD enumeration values.

## Conclusion

The **XmlSchemator** is a sophisticated meta-programming tool. It treats code as data, transforming the strict, typed definitions of XML Schemas into the flexible, object-oriented structure of a Laravel/Apiato application. This ensures that the application stays strictly compliant with SAT regulations without manual maintenance of thousands of classes.
