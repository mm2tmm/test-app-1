<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dashboard.header') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-green-300 border-b border-gray-300">
                    <form role="form" method="POST" action="{{route('calculate')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="txt" class="form-label align-top">متن</label>
                            <textarea class="form-control" id="txt" name="txt" aria-describedby="txt_help" rows="5">{{ old("txt") }}</textarea>
                            <div id="txt_help" class="form-text">
                                لطفا متنی را جهت محاسبه تعداد جملات وارد فرمایین
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">محاسبه</button>
                        </form>
                    </form>
                    
                    @if (isset($result))
                        <div class="p-6 text-center text-white border-b border-red-500">
                            <h1 class="mt-3 p-4 bg-green-600">
                                {{ $text }}
                            </h1>
                            <h4 class="bg-green-800">تعداد جملات متن:
                                <span class="badge bg-info">
                                    {{ $result }}
                                </span>
                            </h4>
                        </div>
                    @endif
                    @if (!empty($msg))
                        <div class="mt-5 p-6 text-center text-white bg-red-900">
                            <span class="text-center">
                                {{ $msg }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>