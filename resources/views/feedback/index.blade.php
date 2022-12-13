@extends('layouts.master-home')
@section('content')
    <script>
        var b = document.getElementsByTagName('body')[0];
        b.className = b.className.replace('king-body-js-off', 'king-body-js-on');
    </script>
    <DIV id="king-body-wrapper" class="king-body-in">
        <DIV CLASS="king-main one-page">
            <DIV CLASS="king-main-in">
                <div class="king-part-form king-inner">
                    <form method="post" action="./feedback">
                        <table class="king-form-tall-table">
                            <tr>
                                <td class="king-form-tall-label">
                                    Your comments or suggestions for King MEDIA:
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <TEXTAREA name="message" id="message" ROWS="5" COLS="40" CLASS="king-form-tall-text"></TEXTAREA>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    Your name: (optional)
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="name" type="text" value="Khai Nguyễn Hữu Minh" class="king-form-tall-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    Your email: (optional)
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="email" type="text" value="nguyenhuuminhkhai@gmail.com" class="king-form-tall-text">
                                    <div class="king-form-tall-note">Privacy: Your email address will not be shared or sold to third parties.</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="king-form-tall-buttons">
                                    <input value="Send" title="" type="submit" class="king-form-tall-button king-form-tall-button-send">
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="dofeedback" value="1">
                        <input type="hidden" name="code" value="1-1670927377-1b2e4c565c323163443945d403179c9d9df4497f">
                        <input type="hidden" name="referer" value="">
                    </form>
                </div>
            </div> <!-- king-main-in -->
        </DIV> <!-- king-main -->
    </DIV>

@endsection
@push('scripts')

@endpush