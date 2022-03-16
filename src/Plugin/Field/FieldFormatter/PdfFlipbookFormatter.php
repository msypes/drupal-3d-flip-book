<?php
/**
 * @file PDFflipbookFormatter.php
 * @author Michael A. Sypes <michael@sypes.org>
 *
 * @abstract
 * Establishes a field formatter for a field to display as a 3D Flipbook.
 */

namespace Drupal\3dflipbook_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'pdf_flipbook' formatter.
 *
 * @FieldFormatter(
 *   id = "pdf_flipbook",
 *   label = @Translation("PDF 3DFlipbook"),
 *   field_types = {
 *     "file"
 *   }
 * )
 */
class PdfFlipbookFormatter extends FormatterBase {

  /**
   * @inheritDoc
   */
  public function viewElements(FieldItemListInterface $items, $langcode){
    $references = $items->referencedEntities();
    $elements = array_map(function($file) use ($items){
      /** @var  \Drupal\file\Entity\File $file */
      return [
        '#theme' => '3d_flipbook',
        '#pdf_file' => str_replace('public://', '/sites/default/files/', $file->getFileUri()),
        '#field_name' => str_replace('_', '-', $items->getName()),
      ];
    }, $references);
    
    return $elements;
  }
}
