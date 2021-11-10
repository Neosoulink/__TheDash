<div class="option-item">
	<div>
		<h3 class="option-title">{{item.title}}</h3>
		<p class="option-detail">{{item.details}}</p>
	</div>

	<div class="option-control">
		<input :type="item.inputType" :value="item.inputValue" :class="{input: item.inputType === 'text'}" />
	</div>
</div>
