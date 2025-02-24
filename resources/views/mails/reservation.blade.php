<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">
<body>
<div id="layout-wrapper">
    <div class="col-12">
        <table class="body-wrap" style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #e9e9e9; margin: 0;">
            <tr style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                <td style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"></td>
                <td class="container" style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;">
                    <div class="content" style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                        <table class="main" itemprop="action" itemscope style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                            <tr style="font-family: 'Roboto', sans-serif; font-size: 14px; margin: 0;">
                                <td class="content-wrap" style="font-family: 'Roboto', sans-serif; box-sizing: border-box; color: #495057; font-size: 14px; vertical-align: top; margin: 0;padding: 30px; box-shadow: 0 3px 15px rgba(30,32,37,.06); ;border-radius: 7px; background-color: #fff;">
                                    <meta itemprop="name" content="Confirm Email" style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"/>
                                    <table style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        @if(checkSettings('custom_project'))
                                            <tr style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block" style="font-family: 'Roboto', sans-serif; color: #878a99; box-sizing: border-box; line-height: 1.5; font-size: 15px; vertical-align: top; margin: 0; padding: 0 0 10px;">
                                                <span style="display: flex; align-items: center; margin-top: 10px; margin-bottom: 10px">
                                                <img src="{{ asset('images/support/abdullah.jpg') }}" alt="Header Avatar"style="border-radius: 50%; width: 40px; height: 40px;">
                                                    <span style="text-align: left; margin-left: 12px;">
                                                    <span style="display: inline-block; margin-left: 4px; font-weight: 500;">
                                                    Muhammad Abdullah
                                                    </span>
                                                    <span style="display: block; margin-left: 4px; font-size: 12px; color: #6c757d;">
                                                    ( {{ $company_details->name }} )
                                                    </span>
                                                    </span>
                                                </span>
                                            </tr>
                                        @endif
                                        <tr style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td class="content-block" style="font-family: 'Roboto', sans-serif; color: #878a99; box-sizing: border-box; line-height: 1.5; font-size: 15px; vertical-align: top; margin: 0; padding: 0 0 10px;">
                                                {!! nl2br(e($content ?? 'Email content/template of reservation details will be displayed there (defined in settings).')) !!}
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; border-top: 1px solid #e9ebec;">
                                            <td class="content-block" style="color: #878a99; text-align: center;font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0; padding-top: 15px">
                                                <div style="margin-bottom: 5px;">
                                                    <img src="{{ asset('website/images/logo/logo-light.png') }}"
                                                         alt="" height="35">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; border-top: 1px solid #e9ebec;">
                                            <td class="content-block" style="color: #878a99; text-align: center;font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;">
                                                Email: {{ $company_details->email }} <br>
                                                Contact/WhatsApp: {{ $company_details->contact }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <div style="text-align: center; margin-top: 25px; color: #0a0c0d; font-size: 14px;">
                            <p style="font-family: 'Roboto', sans-serif;">© Powered by
                                <a href="https://arcoticsolutions.com" style="color: #0a0c0d;"> Arcotic Solutions</a>
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>