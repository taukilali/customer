<?php
namespace RedboxDigital\Customer\Block;

class Customer extends \Magento\Framework\View\Element\Template
{
    protected $customerSession;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->customerSession = $customerSession;
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    public function getCustomer()
    {
        $customerData = $this->_customerSession->getCustomer();
        return $customerData->getData();
    }
    public function getLinkedinProfile()
    {
        $linkedinUrl = $this->_customerSession->getCustomer()->getLinkedinProfile();
        return $linkedinUrl;
    }
    /**
     * @return bool
     */
    public function getCustomerSession()
    {
        /** Bug in magento 2 if full page cache enabled */
        return $this->_customerSession->getCustomer();
    }
}