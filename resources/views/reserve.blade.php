<!--
        <form action="{{ route('glossary.update', $glossaryItem->id) }}" method="POST">
            @csrf
            @if (isset($glossaryItem->id))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="item_id">Item ID:</label>
                <input type="text" id="item_id" name="item_id" value="{{ $glossaryItem->item_id }}" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="language_id">Language:</label>
                <select name="language_id" id="language_id" class="form-control">
                    @foreach ($languages as $language)
                        <option value="{{ $language->id }}" {{ $glossaryItem->language_id === $language->id ? 'selected' : '' }}>
                            {{ $language->language }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="item_name">Item Name:</label>
                <input type="text" id="item_name" name="item_name" value="{{ $glossaryItem->item_name }}" class="form-control" required class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
            </div>

            <div class="form-group">
                @if (isset($glossaryItem->id))
                    <button type="submit" class="btn btn-primary" id="updateButton">Update</button>
                @else
                    <button type="submit" class="btn btn-primary" id="updateButton">Add</button>
                @endif
                <a href="{{route('glossary')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div> -->