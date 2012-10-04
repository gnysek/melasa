<?php

Yii::import('zii.widgets.CBreadcrumbs');

class Breadcrumbs extends CBreadcrumbs {

	public function run() {
		if (empty($this->links))
			return;

		echo CHtml::openTag($this->tagName, $this->htmlOptions) . "\n";
		$links = array();
		if ($this->homeLink === null) {
			//$links[] = CHtml::link(Yii::t('zii', 'Home'), Yii::app()->homeUrl);
			$links[] = strtr($this->activeLinkTemplate, array(
				'{url}' => CHtml::normalizeUrl(Yii::app()->homeUrl),
				'{label}' => 'Home',
				));
		} else if ($this->homeLink !== false) {
//			$links[] = $this->homeLink;
			$links[] = strtr($this->activeLinkTemplate, array(
				'{url}' => $this->homeLink,
				'{label}' => $this->encodeLabel ? CHtml::encode($label) : $label,
				));
		}
		foreach ($this->links as $label => $url) {
			if (is_string($label) || is_array($url))
				$links[] = strtr($this->activeLinkTemplate, array(
					'{url}' => CHtml::normalizeUrl($url),
					'{label}' => $this->encodeLabel ? CHtml::encode($label) : $label,
					));
			else
				$links[] = str_replace('{label}', $this->encodeLabel ? CHtml::encode($url) : $url, $this->inactiveLinkTemplate);
		}
		echo implode($this->separator, $links);
		echo CHtml::closeTag($this->tagName);
	}

}
