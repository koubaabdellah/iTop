<?php
/**
 * Copyright (C) 2013-2020 Combodo SARL
 *
 * This file is part of iTop.
 *
 * iTop is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * iTop is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 */

namespace Combodo\iTop\Application\UI\Component\Panel;


use Combodo\iTop\Application\UI\iUIBlock;
use Combodo\iTop\Application\UI\UIBlock;

/**
 * Class Panel
 *
 * @author Stephen Abello <stephen.abello@combodo.com>
 * @package Combodo\iTop\Application\UI\Component\Panel
 * @since 2.8.0
 */
class Panel extends UIBlock
{
	// Overloaded constants
	public const BLOCK_CODE = 'ibo-panel';
	public const HTML_TEMPLATE_REL_PATH = 'components/panel/layout';
	public const JS_TEMPLATE_REL_PATH = 'components/panel/layout';

	// Specific constants
	/** @var string ENUM_COLOR_PRIMARY */
	public const ENUM_COLOR_PRIMARY = 'primary';
	/** @var string ENUM_COLOR_SECONDARY */
	public const ENUM_COLOR_SECONDARY = 'secondary';

	/** @var string ENUM_COLOR_NEUTRAL */
	public const ENUM_COLOR_NEUTRAL = 'neutral';
	/** @var string ENUM_COLOR_INFORMATION */
	public const ENUM_COLOR_INFORMATION = 'information';
	/** @var string ENUM_COLOR_SUCCESS */
	public const ENUM_COLOR_SUCCESS = 'success';
	/** @var string ENUM_COLOR_FAILURE */
	public const ENUM_COLOR_FAILURE = 'failure';
	/** @var string ENUM_COLOR_WARNING */
	public const ENUM_COLOR_WARNING = 'warning';
	/** @var string ENUM_COLOR_DANGER */
	public const ENUM_COLOR_DANGER = 'danger';

	/** @var string ENUM_COLOR_GREY */
	public const ENUM_COLOR_GREY = 'grey';
	/** @var string ENUM_COLOR_BLUEGREY */
	public const ENUM_COLOR_BLUEGREY = 'blue-grey';
	/** @var string ENUM_COLOR_BLUE */
	public const ENUM_COLOR_BLUE = 'blue';
	/** @var string ENUM_COLOR_CYAN */
	public const ENUM_COLOR_CYAN = 'cyan';
	/** @var string ENUM_COLOR_GREEN */
	public const ENUM_COLOR_GREEN = 'green';
	/** @var string ENUM_COLOR_ORANGE */
	public const ENUM_COLOR_ORANGE = 'orange';
	/** @var string ENUM_COLOR_RED */
	public const ENUM_COLOR_RED = 'red';
	/** @var string ENUM_COLOR_PINK */
	public const ENUM_COLOR_PINK = 'pink';

	/** @var string DEFAULT_COLOR */
	public const DEFAULT_COLOR = self::ENUM_COLOR_NEUTRAL;

	/** @var string $sTitle */
	protected $sTitle;
	/** @var array $aSubBlocks */
	protected $aSubBlocks;
	/** @var string $sColor */
	protected $sColor;

	/**
	 * Panel constructor.
	 *
	 * @param string $sTitle
	 * @param \Combodo\iTop\Application\UI\iUIBlock[] $aSubBlocks
	 * @param string $sColor
	 * @param string|null $sId
	 */
	public function __construct(string $sTitle = '', array $aSubBlocks = [], string $sColor = self::DEFAULT_COLOR, ?string $sId = null)
	{
		$this->sTitle = $sTitle;
		$this->aSubBlocks = $aSubBlocks;
		$this->sColor = $sColor;
		parent::__construct($sId);
	}

	/**
	 * @return string
	 */
	public function GetTitle()
	{
		return $this->sTitle;
	}

	/**
	 * @param string $sTitle
	 *
	 * @return $this
	 */
	public function SetTitle(string $sTitle)
	{
		$this->sTitle = $sTitle;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function GetSubBlocks()
	{
		return $this->aSubBlocks;
	}

	/**
	 * Set all sub blocks at once, replacing all existing ones
	 *
	 * @param \Combodo\iTop\Application\UI\iUIBlock[] $aSubBlocks
	 *
	 * @return $this
	 */
	public function SetSubBlocks(array $aSubBlocks)
	{
		foreach ($aSubBlocks as $oSubBlock)
		{
			$this->AddSubBlock($oSubBlock);
		}

		return $this;
	}

	/**
	 * Add $oSubBlock, replacing any block with the same ID
	 *
	 * @param \Combodo\iTop\Application\UI\iUIBlock $oSubBlock
	 *
	 * @return $this
	 */
	public function AddSubBlock(iUIBlock $oSubBlock)
	{
		$this->aSubBlocks[$oSubBlock->GetId()] = $oSubBlock;

		return $this;
	}

	/**
	 * Remove the sub block identified by $sId.
	 * Note that if no sub block matches the ID, it proceeds silently.
	 *
	 * @param string $sId ID of the sub block to remove
	 *
	 * @return $this
	 */
	public function RemoveSubBlock(string $sId)
	{
		if (array_key_exists($sId, $this->aSubBlocks))
		{
			unset($this->aSubBlocks[$sId]);
		}

		return $this;
	}

	/**
	 * @return string
	 */
	public function GetColor()
	{
		return $this->sColor;
	}

	/**
	 * @param string $sColor
	 *
	 * @return $this
	 */
	public function SetColor(string $sColor)
	{
		$this->sColor = $sColor;

		return $this;
	}
}