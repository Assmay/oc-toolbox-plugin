<?php namespace Lovata\Toolbox\Classes\Helper;

use SimpleXMLElement;

/**
 * Class ImportXMLNode
 * @package Lovata\Toolbox\Classes\Helper
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ImportXMLNode extends SimpleXMLElement
{
    /**
     * Find elements by path
     * @param string $sPath
     * @param string|null $sPrefix
     * @param string|null $sNamespace
     * @return array|null|ImportXMLNode[]
     */
    public function findListByPath($sPath, $sPrefix = null, $sNamespace = null)
    {
        $sPath = trim($sPath);
        if (empty($sPath)) {
            return null;
        }

        if (!empty($sPrefix) && !empty($sNamespace)) {
            $this->registerXPathNamespace($sPrefix, $sNamespace);
        }
        $arResult = $this->xpath($sPath);

        return $arResult;
    }

    /**
     * @param \SimpleXMLElement $obNode
     * @param string            $sFieldPath
     * @return string|null|array
     */
    public function getValueByPath($sFieldPath)
    {
        if (empty($sFieldPath)) {
            return null;
        }

        $arValueNodeList = $this->findListByPath($sFieldPath);
        if (empty($arValueNodeList)) {
            return null;
        }

        $arResult = [];
        foreach ($arValueNodeList as $obValueNode) {
            $arResult[] = (string) $obValueNode;
        }

        if (count($arResult) == 1) {
            return array_shift($arResult);
        } elseif (empty($arResult)) {
            return null;
        }

        return $arResult;
    }
}
