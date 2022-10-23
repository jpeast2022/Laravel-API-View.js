<template>
    <div class="contain">
        <div class="row">
            <div class="col-md-4" style="margin:10px auto">
                <div class="card overflow-auto"  style="height: 550px">
                    <div class="card-header"> <h2>Task Title</h2></div>
                        <div class="card-body" v-for="(Tasks,index) in TaskData"  :key="index">
                        <h3>
                            <a class="list-group-item border p-4"> <br>
                               Task-Id : {{ Tasks.id }} <br>
                               Task : {{ Tasks.attributes.name }}
                               
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
                <div class="col-md-8 overflow-auto" style="height: 550px;">
                    <div class="row">
                        <div class="col-sm-6 task-container" v-for="(Tasks,index) in TaskData"  :key="index">
                            <div class="card task-card">
                                <div class="card-header">
                                    <p class="text-secondary">Posted by : <span class="text-success">{{ Tasks.relationships.username }}</span></p>
                                </div>
                                <div class="card-body">
                                    <div class="p-2 overflow-auto" style="height:160px;">
                                        <h4 class="card-title text-primary">
                                            {{ Tasks.attributes.name }}
                                
                                        </h4>
                                        <p class="card-text text-secondary">{{ Tasks.attributes.description }}</p>
                                    </div><br>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                                <div class="card-footer">
                                    <p class="text-center text-secondary">Date : {{ Tasks.attributes.created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>  
    </div>
</template>
<script>
export default {
    name: 'Task',
    data: function(){
        return {
            TaskData: [],            
        }        
    },
     mounted(){
        this.loadTask();                
     },
     
     methods: {
        async loadTask(){
            const res = await fetch('http://127.0.0.1:8000/api/tasks',{
              method: 'GET',
              headers: {
                'Accept': 'application/vnd.api+json',
                'Content-Type': 'application/vnd.api+json',
                'Authorization': 'Bearer '+ localStorage.getItem('Bearer-Token')
              },
            })
            const post = await res.json()
              if(post){
                console.log(post.data)
                this.TaskData = post.data;
                console.log(localStorage.getItem('Bearer-Token'))
              }else{
                console.log(post.error)
              }

        }
     }
    
}
</script>
<style scoped>
    ::-webkit-scrollbar{
        display: none;
    }
    .contain{
        width: 100%;
        height: max-content;
        overflow: hidden;
    }
    *{
        font-family: Arial, Helvetica, sans-serif;
    }
    body{
        /* width: 100%; */
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    .col-md-8{
        /* background: red; */
        overflow: hidden;
        
    }
    .task-card{
        margin:12px; 
        height: 350px;
        /* height: 520px; */
    }
</style>