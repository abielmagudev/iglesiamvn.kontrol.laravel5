Vue.component('members-suggestion', {
    template: `<div>
        <input 
            type="search"
            name="member_fullname"
            placeholder="Buscar miembro por nombre"
            list="members_suggested"
            class="input" 
            v-model="suggesting"
            @input="membersSuggest()"
        />
        <datalist id="members_suggested">
            <option v-for="(member,index) in list" :key="index" :value="member.fullname"></option>
        </datalist>
    </div>`,
    name: 'MembersSuggestion',
    props: ['route'],
    data: function () {
        return {
            suggesting: '',
            list: []
        }
    },
    methods: {
        membersSuggest () {
            if( this.suggesting.length < 3 )
                return;
            
            fetch(this.route + this.suggesting, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest", // Ajax Request
                    "Content-Type": "application/json", // Content returned (response)
                    "Accept": "application/json, text-plain, */*", // Content that the client can process
                    // "X-CSRF-TOKEN": token // Token for validate request
                   },
                  method: 'get',
                  credentials: "same-origin"
            })
            .then( response => response.json() )
            .then( json => { this.list = json } )
            .catch( e => { console.log(e) })

            /*
            $.ajax({
                url: this.route + this.suggesting,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    console.info(response)
                }
            })
            */
        }
    }
})


const app = new Vue({
    el: "#app"
})