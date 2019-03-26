<?php

namespace SmileSolutions\Captcha\Model;

class DefaultModel extends \Magento\Captcha\Model\DefaultModel
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * @param \Magento\Framework\Session\SessionManagerInterface $session
     * @param \Magento\Captcha\Helper\Data $captchaData
     * @param \Magento\Captcha\Model\ResourceModel\LogFactory $resLogFactory
     * @param string $formId
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @throws \Zend\Captcha\Exception\ExtensionNotLoadedException
     */
    public function __construct(
        \Magento\Framework\Session\SessionManagerInterface $session,
        \Magento\Captcha\Helper\Data $captchaData,
        \Magento\Captcha\Model\ResourceModel\LogFactory $resLogFactory,
        $formId,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($session, $captchaData, $resLogFactory, $formId);
        $this->_scopeConfig = $scopeConfig;

        $this->setNoiseLevels();
    }

    private function setNoiseLevels()
    {
        $this->dotNoiseLevel = $this->_scopeConfig->getValue('smilesolutions_captcha/captcha/dot_noise');
        $this->lineNoiseLevel = $this->_scopeConfig->getValue('smilesolutions_captcha/captcha/line_noise');
    }
}