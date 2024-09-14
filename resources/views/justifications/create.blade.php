<form action="{{ route('justifications.store') }}" method="POST">
    @csrf
    <div>
        <label for="justification">Why do you need this designation?</label>
        <textarea name="justification" required></textarea>
    </div>
    <button type="submit">Submit Justification</button>
</form>
