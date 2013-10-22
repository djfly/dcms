<?php
/**
 * PermissionDataProvider class file.
 * @author Ricardo Obregón <ricardo@obregon.co>
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Ricardo Obregón 2012-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package auth.components
 */

/**
 * Data provider for listing permissions.
 */
class PermissionDataProvider extends CArrayDataProvider
{
    /**
     * @var string
     */
    public $keyField = 'name';
}
