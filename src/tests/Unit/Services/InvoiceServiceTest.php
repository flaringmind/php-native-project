<?php

declare(strict_types=1);

namespace Services;

use App\Services\EmailService;
use App\Services\InvoiceService;
use App\Services\PaymentGatewayService;
use App\Services\SalesTaxService;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase
{
    #[Test]
    public function it_processes_invoice(): void
    {
        $salesTaxServiceMock    = $this->createMock(SalesTaxService::class);
        $gatewayServiceMock     = $this->createMock(PaymentGatewayService::class);
        $emailServiceMock       = $this->createMock(EmailService::class);

        $gatewayServiceMock->method('charge')->willReturn(true);

        $invoiceService = new InvoiceService(
            $salesTaxServiceMock,
            $gatewayServiceMock,
            $emailServiceMock
        );

        $customer = ['name' => 'Leatherman'];
        $amount = 5500;

        $processResult = $invoiceService->process($customer, $amount);
        $this->assertTrue($processResult);
    }

    #[Test]
    public function it_sends_receipt_email_when_invoice_is_processed(): void
    {
        $salesTaxServiceMock    = $this->createMock(SalesTaxService::class);
        $gatewayServiceMock     = $this->createMock(PaymentGatewayService::class);
        $emailServiceMock       = $this->createMock(EmailService::class);

        $customer = ['name' => 'Leatherman'];

        $gatewayServiceMock->method('charge')->willReturn(true);
        $emailServiceMock
            ->expects($this->once())
            ->method('send')
            ->with($customer, 'receipt');
        $invoiceService = new InvoiceService(
            $salesTaxServiceMock,
            $gatewayServiceMock,
            $emailServiceMock
        );

        $amount = 5500;

        $processResult = $invoiceService->process($customer, $amount);
        $this->assertTrue($processResult);
    }
}
