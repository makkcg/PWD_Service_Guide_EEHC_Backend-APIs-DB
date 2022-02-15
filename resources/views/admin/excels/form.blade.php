
<div dir="rtl">
   <!-- general form elements -->
   <div dir="rtl" class="box box-info">

      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="form-group col-md-12 {{ $errors->has('className') ? ' has-error' : '' }}">
         <label for="className">ادخال شيت الاكسيل </label>

        <select class="form-control" name="className">
            <option value="">اختار الجدول</option>
            <option value="App\Imports\About\AboutsImport">ادخال بيانات عن المشروع</option>
            <option value="App\Imports\About\AboutSoundsImport">ادخال اصوات المشروع</option>
            <option value="App\Imports\About\AboutVideosImport">ادخال فيديوهات المشروع</option>

            <option value="App\Imports\Foundation\FoundationsImport">ادخال بيانات المؤسسة</option>
            <option value="App\Imports\Foundation\FoundationImagesImport">ادخال صور المؤسسة</option>
            <option value="App\Imports\Foundation\FoundationSoundsImport">ادخال اصوات المؤسسة</option>
            <option value="App\Imports\Foundation\FoundationVideosImport">ادخال فيديوهات المؤسسة</option>

            <option value="App\Imports\Branch\BranchsImport">ادخال بيانات الفروع</option>
            <option value="App\Imports\Branch\BranchImagesImport">ادخال صور الفروع</option>
            <option value="App\Imports\Branch\BranchSoundsImport">ادخال اصوات الفروع</option>
            <option value="App\Imports\Branch\BranchVideosImport">ادخال فيديوهات الفروع</option>

            <option value="App\Imports\Service\ServicesImport">ادخال بيانات الخدمات</option>
            <option value="App\Imports\Service\ServiceImagesImport">ادخال صور الخدمات</option>
            <option value="App\Imports\Service\ServiceMediasImport">ادخال  اصوات وفيديوهات الخدمات</option>

            <option value="App\Imports\Document\DocumentsImport">ادخال بيانات المستندات</option>
            <option value="App\Imports\Document\DocumentImagesImport">ادخال صور المستندات</option>
            <option value="App\Imports\Document\DocumentMediasImport">ادخال  اصوات وفيديوهات المستندات</option>

            <option value="App\Imports\Faq\FaqsImport">ادخال بيانات الاسئلة الشائعة</option>
            <option value="App\Imports\Faq\FaqImagesImport">ادخال صور الاسئلة الشائعة</option>
            <option value="App\Imports\Faq\FaqMediasImport">ادخال  اصوات وفيديوهات الاسئلة الشائعة</option>

            <option value="App\Imports\Procedure\ProceduresImport">ادخال بيانات الإجراءات</option>
            <option value="App\Imports\Procedure\ProcedureImagesImport">ادخال صور الإجراءات</option>
            <option value="App\Imports\Procedure\ProcedureMediasImport">ادخال  اصوات وفيديوهات الإجراءات</option>

            <option value="App\Imports\Regulation\RegulationsImport">ادخال بيانات القوانين المنظمة</option>
            <option value="App\Imports\Regulation\RegulationImagesImport">ادخال صور القوانين المنظمة</option>
            <option value="App\Imports\Regulation\RegulationMediasImport">ادخال  اصوات وفيديوهات القوانين المنظمة</option>
        </select>
        <br>
        <input type="file" name="file" class="form-control">
        <br>
        @if($errors->has('file'))
        <span class="help-bloack">
        <strong>{{$errors->first('file') }}</strong>
        </span>
        @endif
</div>
</div>
      <!-- /.box-body -->
   </div>

</div>
@section('scripts')
   <script>
          CKEDITOR.replace( 'desc_ar' );
   </script>
@endsection
