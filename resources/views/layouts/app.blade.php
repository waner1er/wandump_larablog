<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>

    @livewireStyles
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="admin-layout">

@include('layouts.navigation')
<br>
<hr>
<!-- Page Heading -->
<header>
    {{ $header }}
</header>

<!-- Page Content -->
<main>
    {{ $slot }}
    <form method="post" action="" enctype="multipart/form-data">
        @csrf

    </form>
</main>
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('upload_image', {
        filebrowserBrowseUrl: '/elfinder/ckeditor',
        filebrowserUploadMethod: 'form',
        removeButtons: 'Cut,Undo,Copy,Redo,Paste,PasteText,PasteFromWord,Replace,Find,SelectAll,Scayt,Form,' +
            'Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Templates,Save,Source,NewPage,ExportPdf,Preview,Print,Bold,CopyFormatting,RemoveFormat,Italic,Underline,Strike,Subscript,Superscript,NumberedList,BulletedList,About,Maximize,TextColor,BGColor,ShowBlocks,Styles,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Link,Unlink,Anchor,Format,Font,FontSize,BidiLtr,JustifyLeft,Blockquote,Outdent,Indent,CreateDiv,JustifyCenter,BidiRtl,Language,JustifyBlock,JustifyRight',

    });
    CKEDITOR.replace('editor', {
        filebrowserBrowseUrl: '/elfinder/ckeditor',
        filebrowserUploadMethod: 'form'
    });
</script>
@livewireScripts

</body>

</html>
